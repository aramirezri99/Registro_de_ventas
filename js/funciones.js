const d = document
var myModal = new bootstrap.Modal(d.getElementById('animal_edit_modal'))
var myModaledit = new bootstrap.Modal(d.getElementById('modal-edit-venta'))
var myModal_delete = new bootstrap.Modal(
  document.getElementById('confirmModal'),
)

var $info = ''
var $detalle = []
var $total = 0

d.addEventListener('DOMContentLoaded', function (e) {
  ObtenerVentas()
  ModalProducto()
  mostrarProductos()
  mostrarPrecio()
  CalcularSubtotal()
  LLenar_tabla()

  mostrarClientes('#OptionCliente')
  mostrarClientes('#cliente-medit')
  RegistrarVenta()
  update()
  eliminar()
})

function ObtenerVentas() {
  const $table = d.querySelector('#tabla-ventas')
  let $text = ''
  const getAll = async () => {
    let res = await fetch('http://localhost/proyect-venta/venta/todas_ventas'),
      json = await res.json()

    json.forEach((el) => {
      $text += `<tr>`
      $text += `<th>${el[0]}</th>`
      $text += `<th>${el[1]}</th>`
      $text += `<th>${el[2]}</th>`
      $text += `<th>${el[3]}</th>`
      $text += `<th>${el[4]}</th>`
      $text += `<th>${el[5]}</th>`
      $text += `<th>${el[6]}</th>`
      $text += `<th><a href="javascript:void(0)" onclick="show(${el[0]})" class="btn btn-info btn-sm"> Editar </a>&nbsp;&nbsp;<button id="${el[0]}" type="button" class="delete-venta btn btn-danger btn-sm"> Eliminar </button></th>`

      $text += `</tr>`
    })

    $table.querySelector('tbody').innerHTML = $text
  }

  getAll()
}

function ModalProducto() {
  const $btnabrir = d.querySelector('#modalproducto')

  $btnabrir.addEventListener('click', function (e) {
    e.preventDefault()
    myModal.show()
  })
}

function mostrarProductos() {
  const $select = d.querySelector('#selproducto')
  let $text = ''
  const getAll = async () => {
    let res = await fetch(
      'http://localhost/proyect-venta/producto/obtener_productos',
    )
    let json = await res.json()

    json.forEach((el) => {
      $text += `<option id="product-combo" value="${el[0]}">${el[1]}</option>`
    })

    $select.innerHTML = $text
  }
  getAll()
}

function mostrarPrecio() {
  const $combobox = d.querySelector('#selproducto')
  const $txtprecio = d.querySelector('#txtprecio')

  $combobox.addEventListener('click', function (e) {
    const $valor = d.querySelector('#selproducto').value

    const getAll = async () => {
      let res = await fetch(
        'http://localhost/proyect-venta/producto/obtener_precio&id=' +
          $valor +
          '',
      )

      let json = await res.json()
      json.forEach((el) => {
        $precio = el[0]
      })
      $txtprecio.value = $precio
    }
    getAll()
  })
}

function CalcularSubtotal() {
  const $txtcantidad = d.querySelector('#txtCantidad')
  const $txtsubtotal = d.querySelector('#txtsubtotal')
  const $txtprecio = d.querySelector('#txtprecio')

  $txtcantidad.addEventListener('keyup', function (e) {
    $cantidad = $txtcantidad.value
    $precio = $txtprecio.value

    $txtsubtotal.value = $cantidad * $precio
  })
}

function LLenar_tabla() {
  const $btnadd = d.querySelector('#btnaddtable')
  const $tabledetall = d.querySelector('#tabla-detalles')
  const $txttotal = d.querySelector('#txttotal')

  $btnadd.addEventListener('click', function (e) {
    e.preventDefault()

    const $select = d.querySelector('#selproducto')

    const $idproducto = d.querySelector('#selproducto').value
    const $nombre = $select.querySelectorAll(`option`)[$idproducto - 1]
      .textContent

    const $txtcantidad = d.querySelector('#txtCantidad').value
    const $txtsubtotal = d.querySelector('#txtsubtotal').value
    const $txtprecio = d.querySelector('#txtprecio').value

    $detalle.push([$idproducto, $txtcantidad, $txtsubtotal, $precio])
    console.log($detalle)

    $info += ` <tr class="fila">`
    $info += ` <th>${$idproducto}</th>`
    $info += ` <th>${$nombre}</th>`
    $info += ` <th>${$txtcantidad}</th>`
    $info += ` <th>${$txtprecio}</th>`
    $info += ` <th>${$txtsubtotal}</th>`

    $info += ` <tr>`

    $tabledetall.querySelector('tbody').innerHTML = $info
    myModal.hide()

    $total = parseFloat($total) + parseFloat($txtsubtotal)
    $txttotal.value = $total
  })
}

function mostrarClientes(optioncliente) {
  const options = d.querySelector(optioncliente)
  let $text = ''

  const getAll = async () => {
    let res = await fetch(
      'http://localhost/proyect-venta/cliente/mostrarclientes',
    )
    let json = await res.json()

    json.forEach((el) => {
      $text += `<option id="cliente-combo" value="${el[0]}">${el[2]}</option>`
    })
    options.innerHTML = $text
  }

  getAll()
}

function RegistrarVenta() {
  const $form = d.querySelector('#registro-venta')

  $form.addEventListener('submit', function (e) {
    e.preventDefault()
    const options = d.querySelector('#Optiontipo').value
    const txtserie = d.querySelector('#txtserie').value
    const txtnumero = d.querySelector('#txtnumero').value
    const selcliente = d.querySelector('#OptionCliente').value
    const txttotal = d.querySelector('#txttotal').value
    const txtuser = d.querySelector('#txtusuario').value
    const $table = d.querySelector('#tabla-detalles tbody')

    let obj = {
      Tipodocumento: options,
      serie: txtserie,
      numero: txtnumero,
      idcliente: selcliente,
      total: txttotal,
      usuario: txtuser,
    }

    const insertar = async () => {
      let res = await fetch(
        'http://localhost/proyect-venta/venta/registrar_venta',
        {
          method: 'POST',
          headers: { 'Content-type': 'application/json' },
          body: JSON.stringify(obj),
        },
      )

      let json = await res.json()

      if (json) {
        toastr.info(
          'El registro fue actualizado correctamente.',
          'Actualizar Registro',
          { timeOut: 3000 },
        )
        $table.innerHTML = ''
        $form.reset()
      }
    }
    insertar()

    RegistrarDetalle()
    ObtenerVentas()
  })
}

function RegistrarDetalle() {
  $detalle.forEach(function (el, index) {
    let $obj = { id: el[0], cantidad: el[1], precio: el[2], subtotal: el[3] }
    const insertar = async () => {
      let res = await fetch(
        'http://localhost/proyect-venta/detalle/registrar',
        {
          method: 'POST',
          headers: { 'Content-type': 'application/json' },
          body: JSON.stringify($obj),
        },
      )
      let json = await res.json()
      if (json) {
        console.log('registrar')
      }
    }

    insertar()
  })
}

function show(id) {
  const modal = async () => {
    const res = await fetch(
      'http://localhost/proyect-venta/venta/get_ventas_forid&id=' + id,
    )

    const idventa = (d.querySelector('#idventa-medit').value = id)
    const respuesta = await res.json()

    myModaledit.toggle()
  }
  modal()
}

function update() {
  const $form = d.querySelector('#ventaedit')
  $form.addEventListener('submit', function (e) {
    e.preventDefault()
    const tipo = d.querySelector('#seltipo-medit').value,
      serie = d.querySelector('#serie-medit').value,
      numero = d.querySelector('#numero-medit').value,
      cliente = d.querySelector('#cliente-medit').value
    id = d.querySelector('#idventa-medit').value

    let obj = {
      id: id,
      tipo: tipo,
      serie: serie,
      numero: numero,
      cliente: cliente,
    }

    const ajax = async () => {
      const res = await fetch(
        'http://localhost/proyect-venta/venta/edit_venta',
        {
          method: 'POST',
          headers: { 'Content-type': 'application/json' },
          body: JSON.stringify(obj),
        },
      )

      const data = await res.json()
      if (data) {
        myModaledit.hide()
        toastr.info(
          'El registro fue actualizado correctamente.',
          'Actualizar Registro',
          { timeOut: 3000 },
        )
      }
    }
    ajax()
    ObtenerVentas()
  })
}

function eliminar() {
  let id
  document.addEventListener('click', (e) => {
    if (e.target.matches('.delete-venta')) {
      //$('#confirmModal').modal('show');
      myModal_delete.show()
      id = `${e.target.getAttribute('id')}`
    }
  })

  const $btn = document.getElementById('btnEliminar')
  $btn.addEventListener('click', (e) => {
    async function delet() {
      const res = await fetch(
        'http://localhost/proyect-venta/venta/delete_venta&id=' + id,
      )
      const respuesta = await res.json()

      if (respuesta) {
        setTimeout(function () {
          myModal_delete.hide()
          toastr.warning(
            'El registro fue eliminado correctamente.',
            'Eliminar Registro',
            { timeOut: 0 },
          )

          //JQUERY
        }, 0)
        ObtenerVentas()
      }
    }
    delet()
  })
}
