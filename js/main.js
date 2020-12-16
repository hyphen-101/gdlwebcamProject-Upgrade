(function() {
    "use strict";

    document.addEventListener('DOMContentLoaded', function() {
        //Mapa .- leaftlet
        var mapa = document.querySelector('#mapa');

        if (mapa) {
            var map = L.map('mapa').setView([20.67392, -103.387163], 16);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([20.67392, -103.387163]).addTo(map)
                .bindPopup('GLDWEBCAMP.<br> Boletos disponibles a la venta.')
                .openPopup();
        }
        //datos del Cliente
        let usr_name = document.querySelector('#nombre');
        let usr_last = document.querySelector('#apellido');
        let usr_email = document.querySelector('#email');

        //Tablas de precio
        let paseDia = document.querySelector('#pase_dia');
        let pase2Dias = document.querySelector('#pase_2_dias');
        let paseCompleto = document.querySelector('#pase_todos_dias');

        //camisas y etiquetas
        let camisa = document.querySelector('#camisa_evento');
        let etiqueta = document.querySelector('#etiquetas');

        //div y extras
        let calcular = document.querySelector('#calcular');
        let btn_pagar = document.querySelector('#pagar');
        let listado_productos = document.querySelector('#lista-productos');
        let suma = document.querySelector('#suma-total');
        let errorDiv = document.querySelector('#error');

        btn_pagar.disabled = true;

        if (calcular) {
            calcular.addEventListener('click', calcularMonto);
            //
            paseDia.addEventListener('mouseout', mostrarDias);
            pase2Dias.addEventListener('mouseout', mostrarDias);
            paseCompleto.addEventListener('mouseout', mostrarDias);

            // Validacion de informacion usuario
            usr_name.addEventListener('blur', validacionCampos);
            usr_last.addEventListener('blur', validacionCampos);
            usr_email.addEventListener('blur', validacionCampos);
            usr_email.addEventListener('blur', validarEmail);
        }

        function validacionCampos() {
            if (this.value == '') {
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = '***Este campo es obligatorio!***';
                this.style.border = '1px solid red';
                errorDiv.style.border = '1px solid red';
            } else {
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #cccccc';

            }
        }

        function validarEmail() {
            if (this.value.indexOf("@") > -1) {
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #cccccc';
            } else {
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = '***Correo Electronico no valido "@"***';
                this.style.border = '1px solid red';
                errorDiv.style.border = '1px solid red';
            }
        }

        function calcularMonto(event) {
            event.preventDefault();
            if (regalo.value === '') {
                alert('Debes elegir un regalo!!');
                regalo.focus();
            } else {
                let paseX1 = parseInt(paseDia.value, 10) || 0,
                    paseX2 = parseInt(pase2Dias.value, 10) || 0,
                    paseX3 = parseInt(paseCompleto.value, 10) || 0,
                    cantCamisa = parseInt(camisa.value, 10) || 0,
                    cantEtiquetas = parseInt(etiqueta.value, 10) || 0;

                let totalPagar = (paseX1 * 30) + (paseX2 * 45) + (paseX3 * 50) + ((cantCamisa * 10) * .93) + (cantEtiquetas * 2);


                let lista_productos = [];

                if (paseX1 >= 1) {
                    lista_productos.push(paseX1 + ' pase de un día');
                }
                if (paseX2 >= 1) {
                    lista_productos.push(paseX2 + ' pase de dos días');
                }
                if (paseX3 >= 1) {
                    lista_productos.push(paseX3 + ' pase de todos los días');
                }
                if (cantEtiquetas >= 1) {
                    lista_productos.push(cantEtiquetas + ' paquete de etiquetas');
                }
                if (cantCamisa >= 1) {
                    lista_productos.push(cantCamisa + ' camisa del evento');
                }

                listado_productos.style.display = 'block';
                listado_productos.innerHTML = '';
                for (let i = 0; i < lista_productos.length; i++) {
                    listado_productos.innerHTML += lista_productos[i] + '</br>';
                }


                suma.innerHTML = '$' + totalPagar.toFixed(2);

                btn_pagar.disabled = false;
                document.querySelector('#total_pedido').value = totalPagar.toFixed(2);
            }

        }

        function mostrarDias() {
            let paseX1 = parseInt(paseDia.value, 10) || 0,
                paseX2 = parseInt(pase2Dias.value, 10) || 0,
                paseX3 = parseInt(paseCompleto.value, 10) || 0;

            let diasElegidos = [];

            if (paseX1 > 0) {
                diasElegidos.push('#viernes');
            } else if (paseX1 === 0 || paseX2 != 0 || paseX3 != 0) {
                document.querySelector('#viernes').style.display = 'none';
            }

            if (paseX2 > 0) {
                diasElegidos.push('#viernes', '#sabado');
            } else if (paseX1 != 0 || paseX2 === 0 || paseX3 != 0) {
                document.querySelector('#viernes', '#sabado').style.display = 'none';
            }

            if (paseX3 > 0) {
                diasElegidos.push('#viernes', '#sabado', '#domingo');
            } else if (paseX1 != 0 || paseX2 != 0 || paseX3 === 0) {
                document.querySelector('#sabado').style.display = 'none';
                document.querySelector('#domingo').style.display = 'none';

            }

            for (let i = 0; i < diasElegidos.length; i++) {
                document.querySelector(diasElegidos[i]).style.display = 'block';
            }

        }




    });
    //DOM content loaded
})();
$(function() {
    //Letras header GDLWEBCAMP
    $('.letras-header').lettering();
    //Bottom-border de menu
    $('.conferencia .barra nav a:first').addClass('activo');
    $('.calendario .barra nav a:eq(1)').addClass('activo');
    $('.invitados .barra nav a:eq(2)').addClass('activo');

    //Barra - menu / Fijo
    let windowHeight = $(window).height();
    let barraAltura = $('.barra').innerHeight();
    $(window).scroll(function() {
        let scroll = $(window).scrollTop();
        if (scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': barraAltura + 'px' });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({ 'margin-top': '0px' });

        }
    });
    //Menu Movil dinamico
    $('.menu-movil').on('click', function() {
        $('.menu-barra nav').slideToggle();
    });
    //Programa del evento / talleres
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activos');
    $('.ocultar:eq(1)').hide();
    $('.ocultar:last').hide();

    $('.menu-programa a').on('click', function() {
        $('.menu-programa a').removeClass('activos');
        $(this).addClass('activos');
        $('.ocultar').hide();
        let enlace = $(this).attr("href");
        $(enlace).fadeIn(1000);

        return false;
    });
    //Animacion de contador evento
    $('.contador-evento li:nth-child(1) p').animateNumber({ number: 6 }, 2400);
    $('.contador-evento li:nth-child(2) p').animateNumber({ number: 15 }, 3000);
    $('.contador-evento li:nth-child(3) p').animateNumber({ number: 3 }, 2000);
    $('.contador-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1200);

    //cuenta regresiva 

    $('.count-down').countdown('2020/12/10 9:00:00', function(event) {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));

    });

    //COLORBOX
    $('.invitado-info').colorbox({ inline: true, width: "%50" });
});