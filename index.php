<!DOCTYPE html>
<html lang="es" class="dark">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TERMINAL.CORE // ARCHIVE</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --bg-body: #050505;
            --bg-card: #0c0c0c;
            --bg-alt: #121212;
            --border: #1a1a1a;
            --border-hover: #333333;
            --text-main: #ffffff;
            --text-dim: #707070;
        }

        /* El contenedor principal ocupa el alto exacto de la pantalla actual */
        .contenedor {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: row;
            box-sizing: border-box;
            overflow: hidden;
        }

        /* ------------------------------------ */

        .izquierda {
            width: 20%;
            max-width: 400px;
            min-width: 250px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            padding: 20px 0;
            box-sizing: border-box;
        }

        .menu-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            transition: transform 0.3s ease;
            width: 100%;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }

        .menu-item img {
            width: 80%;
            max-width: 250px;
            height: auto;
            aspect-ratio: 250 / 120;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .label {
            font-size: 13px;
            font-weight: 700;
            color: #000;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* ----------------------------------- */
        /* SECCIÓN CENTRAL Y MOSAICO DE IMÁGENES CORREGIDO */

        .central {
            flex: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            touch-action: pan-x;
            -webkit-overflow-scrolling: touch;
            box-sizing: border-box;
        }

        .central::-webkit-scrollbar {
            display: none;
        }

        .banner {
            margin-top: 20px;
            width: 100%;
            height: auto;
            max-width: 1100px;
            /* Evita que se estire infinitamente en monitores gigantes */
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-direction: row;
            /* Forzado de manera horizontal simétrica */
            justify-content: center;
            gap: 15px;
            /* Controla la separación exacta de los bloques en cualquier pantalla */
            padding: 0 15px;
            box-sizing: border-box;
        }

        .img {
            width: 50%;
            /* Se divide de manera exacta 50% y 50% */
            height: auto;
            display: flex;
        }

        .img2 {
            width: 100%;
            height: auto;
            aspect-ratio: 500 / 470;
            /* Mantiene la proporción idéntica a tu diseño original */
            border: 1px solid var(--border);
            border-radius: 20px;
            background: var(--bg-card);
            transition: all 0.4s ease;
            overflow: hidden;
        }

        .img1 {
            width: 50%;
            /* Comparte el espacio a la par con la imagen de la izquierda */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Distribuye el espacio sobrante arriba y abajo uniformemente */
            gap: 15px;
            /* Margen exacto entre la foto de arriba y la de abajo */
        }

        .img1_1,
        .img1_2 {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: var(--bg-card);
            transition: all 0.4s ease;
            overflow: hidden;
        }

        /* Forzamos que las alturas de las tarjetas derechas sumen perfectamente el bloque izquierdo */
        .img1_1 {
            height: calc(55% - 7.5px);
        }

        .img1_2 {
            height: calc(45% - 7.5px);
        }

        .ficha:hover .ficha_tex h2 {
            color: #000000;
        }

        .ficha:hover .ficha_tex h1,
        .ficha:hover .ficha_tex h3 {
            color: #999;
        }

        .titulo_derecha:hover p {
            color: #fff;
        }

        .publicacion:hover .publicacion_msj {
            color: #aaa;
        }

        /* ----------------------------------- */

        .derecha {
            width: 22%;
            max-width: 400px;
            min-width: 300px;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .contenedor_derecha {
            margin: 10px 25px;
            height: 60%;
            border: 1px solid #e0e0e0;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        .titulo_derecha {
            width: 100%;
            height: 45px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
        }

        .titulo_derecha p {
            font-size: 12px;
            color: #999;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            margin: 0;
        }

        .contenedor_fichas_scroll {
            flex: 1;
            overflow-y: auto;
        }

        .contenedor_fichas_scroll::-webkit-scrollbar {
            width: 4px;
        }

        .contenedor_fichas_scroll::-webkit-scrollbar-thumb {
            background: #dbdbdb;
            border-radius: 10px;
        }

        .ficha {
            width: 100%;
            height: 85px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .ficha:hover {
            background: #f7f7f7;
        }

        .ficha_tex {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .ficha_tex h1 {
            font-size: 9px;
            color: #b3b3b3;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 1px;
        }

        .ficha_tex h2 {
            font-size: 14px;
            color: #333;
            font-weight: 600;
            margin: 4px 0;
        }

        .ficha_tex h3 {
            font-size: 10px;
            color: #007bff;
            font-weight: 700;
            margin: 0;
        }

        .derecha_img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            background: #ffffff;
            overflow: hidden;
            border: 1px solid #ffffff;
        }

        .derecha_img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .contenedor_derecha_img {
            margin: 10px 25px;
            height: 33.5%;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: var(--bg-card);
            overflow: hidden;
        }

        /* ------------------------- */

        .contenedor_derecha_img,
        .publicacion_img,
        .img2,
        .img1_1,
        .img1_2,
        .derecha_img {
            overflow: hidden;
        }

        .contenedor_derecha_img img,
        .publicacion_img img,
        .img2 img,
        .img1_1 img,
        .img1_2 img,
        .derecha_img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Cambiado a cover para que mantenga la proporción interna de la foto */
            display: block;
        }

        .ficha:hover .derecha_img {
            border: 1px solid #444;
        }

        .ficha1:hover .derecha_img {
            border: 1px solid #444;
        }

        /* ------------------------- */

        .contenedor_publicacion {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            padding: 0 10px;
        }

        .publicacion {
            margin-top: 30px;
            background: var(--bg-card);
            width: 95%;
            max-width: 900px;
            height: auto;
            aspect-ratio: 900 / 700;
            max-height: 700px;
            margin-bottom: 10px;
            border-radius: 20px;
            border: 1px solid var(--border);
            display: flex;
            flex-direction: row;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            box-sizing: border-box;
        }

        .publicacion:hover {
            border: 1px solid var(--border-hover);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .publicacion_img {
            background: var(--bg-alt);
            width: 55%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .publicacion_img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .publicacion_datos {
            width: 45%;
            display: flex;
            flex-direction: column;
            background-color: #ffffff;
            color: #000;
            height: 100%;
        }

        .publicacion_txt {
            padding: 14px;
            border-bottom: 1px solid #efefef;
            min-height: 60px;
        }

        .publicacion_msj {
            flex: 1;
            padding: 14px;
            overflow-y: auto;
        }

        .publicacion_footer {
            padding: 14px;
            border-top: 1px solid #efefef;
            background: #fff;
        }

        .comment-block {
            display: flex;
            margin-bottom: 14px;
            align-items: flex-start;
        }

        .comment-content {
            flex: 1;
            min-width: 0;
        }

        .avatar {
            width: 32px;
            height: 32px;
            background: #ddd;
            border-radius: 50%;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .avatar.small {
            width: 24px;
            height: 24px;
        }

        .user-name {
            font-weight: 700;
            font-size: 13px;
            margin-right: 5px;
        }

        .toggle-replies {
            font-size: 11px;
            color: #8e8e8e;
            cursor: pointer;
            margin-top: 4px;
            font-weight: 600;
        }

        .hidden {
            display: none;
        }

        .reply-list {
            margin-top: 8px;
        }

        .reply-block {
            display: flex;
            flex-direction: column;
            align-items: start;
            margin-bottom: 8px;
            font-size: 13px;
        }

        .actions {
            display: flex;
            gap: 15px;
            margin-bottom: 8px;
        }

        .actions button {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .likes {
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .publicacion_footer input {
            width: 100%;
            border: none;
            outline: none;
            font-size: 13px;
            padding: 4px 0;
        }

        .publicacion_msj::-webkit-scrollbar {
            width: 4px;
        }

        .publicacion_msj::-webkit-scrollbar-thumb {
            background: #dbdbdb;
            border-radius: 10px;
        }

        /* ==========================================================================
   MEDIA QUERY PARA RESPONSIVE EN PANTALLAS PEQUEÑAS Y MÓVILES
   ========================================================================== */
        @media (max-width: 992px) {
            .contenedor {
                flex-direction: column;
                height: auto;
                overflow-y: auto;
            }

            .izquierda,
            .derecha,
            .central {
                width: 100%;
                max-width: 100%;
                min-width: 100%;
                height: auto;
            }

            .izquierda {
                flex-direction: row;
                overflow-x: auto;
                padding: 10px;
                justify-content: flex-start;
                gap: 15px;
            }

            .menu-item {
                width: auto;
            }

            .menu-item img {
                width: 120px;
                height: 60px;
            }

            /* MANTENEMOS EL MOSAICO PERFECTO DE IMÁGENES LADO A LADO EN MÓVIL TAMBIÉN */
            .banner {
                flex-direction: row;
                height: auto;
                gap: 10px;
                padding: 0 10px;
            }

            .img {
                width: 50%;
            }

            .img1 {
                width: 50%;
                gap: 10px;
            }

            .img1_1 {
                height: calc(55% - 5px);
            }

            .img1_2 {
                height: calc(45% - 5px);
            }

            .contenedor_derecha,
            .contenedor_derecha_img {
                margin: 15px;
                height: auto;
            }

            .contenedor_fichas_scroll {
                overflow-y: visible;
            }

            .publicacion {
                flex-direction: row;
                width: 100%;
                aspect-ratio: auto;
                height: 450px;
            }

            .publicacion_img {
                width: 50%;
                height: 100%;
            }

            .publicacion_datos {
                width: 50%;
                height: 100%;
            }

            .publicacion_datos h2,
            .publicacion_datos p,
            .user-name,
            .comment-content {
                font-size: 11px !important;
            }

            .publicacion_txt {
                padding: 8px;
                min-height: auto;
            }

            .publicacion_msj {
                padding: 8px;
            }
        }
    </style>

</head>

<body>

    <?php include dirname(__DIR__) . '/topbar.php'; ?>

    <div class="topbar2"></div>
    <div class="contenedor">

        <div class="izquierda">
            <div class="menu-item">
                <img src="img/personajes.jpg" alt="Personajes">
                <span class="label">PERSONAJES</span>
            </div>
            <div class="menu-item">
                <img src="img/universo.jpg" alt="El Universo">
                <span class="label">EL UNIVERSO</span>
            </div>
            <div class="menu-item">
                <img src="img/episodios.png" alt="Casos">
                <span class="label">GUIA DE EPISODIOS</span>
            </div>
            <div class="menu-item">
                <img src="img/proximamente.png" alt="Ajustes">
                <span class="label">PROXIMAMENTE</span>
            </div>
        </div>

        <div class="central">
            <div class="banner">
                <div class="img">
                    <div class="img2">
                        <img src="img/foto1.png" alt="Descripción de la imagen">
                    </div>
                </div>
                <div class="img1">
                    <div class="img1_1">
                        <img src="img/foto4.png" alt="Descripción de la imagen">
                    </div>
                    <div class="img1_2">
                        <img src="img/foto5.jpg" alt="Descripción de la imagen">
                    </div>
                </div>
            </div>
            <div class="contenedor_publicacion">

                <div class="publicacion">
                    <div class="publicacion_img">
                        <img src="img/carta.png" alt="Nota Confidencial - Giro de Trama">
                    </div>

                    <div class="publicacion_datos">
                        <div class="publicacion_txt">
                            <div class="comment-row">
                                <div class="avatar-estudio"></div>
                                <div class="comment-content">
                                    <span class="user-name">Studios_Oficial</span>
                                    <strong></strong><br><br>
                                    <strong>PAGINAS DE UN DIARIO ROTO</strong><br>LA CONFESIÓN OCULTA DE DANIELA<br>
                                </div>
                            </div>
                        </div>

                        <div class="publicacion_msj">

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">PodcastCriminal</span> ¡No puede ser! ¡Esto es una tragedia griega! Daniela planeó un secuestro, torturó psicológicamente a Leonardo y lo mató en el búnker pensando que él tenía encerrada a Elizabeth, ¡pero Leonardo se estaba escondiendo allí de los extorsionadores! Me voló la cabeza por completo.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> O sea que cuando Leonardo cambió las llantas del auto y metió a Vanessa a la casa, ¡estaba tratando de fingir normalidad para que el "Último Eslabón" no lo matara a él ni a su familia!
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">LoreHunter</span> @TeoriasLocas ¡Exacto! Y las pistas vagas que Leonardo dio antes de morir no eran para confesar un crimen, ¡estaba tratando de advertirle a Daniela de la zona donde ese monstruo operaba! Qué dolor.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">DetectiveSofa</span> Legalmente esto destruye cualquier intento de Daniela de alegar legítima defensa. Fue un homicidio basado en una falsa suposición. Está totalmente condenada.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">PodcastCriminal</span> Lo peor de todo es la última frase: "No hay perdón para mí". Daniela ya sabe que arruinó todo. Su cara en la sala de interrogatorios ahora cobra el doble de sentido.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">AnaliZando</span> "El perfume ajeno, las joyas... era para la hija de este monstruo. Estaba comprando su silencio". ¡ESPEREN! ¿Quién de los personajes femeninos ha estado usando joyas caras o se vio envuelta en esto? ¿¡VANESSA LA AMANTE!?
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CrimenYJusticia_99</span> ¡SÍ! ¡Vanessa es la hija del "Último Eslabón"! Por eso Leonardo se metió con ella. No era una aventura amorosa por gusto, era una estrategia de supervivencia para apaciguar al extorsionador.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Conspiranoico_01</span> @CrimenYJusticia_99 Dios mío, esto encaja demasiado bien. Vanessa se metió a la casa de Elizabeth no por descarada, sino porque su padre la envió a vigilar que Leonardo no escapara. ¡La villana silenciosa siempre fue ella!
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Vane_NoCulpable</span> Oigan, dejen de acusarme, yo no tengo nada que ver con mafias. ¡Esto es solo un guion transmedia! (Pero admito que esa teoría de que mi personaje sea la hija del monstruo está a otro nivel).
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AnaliZando</span> @Vane_NoCulpable No te descuides Vanessa, la policía científica ya te liberó por el arma, pero si descubren que tu "padre" manejaba el búnker secundario... vuelves a la celda.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">CSI_Fanatic</span> Si Leonardo no secuestró a Elizabeth... ¿entonces quién la encerró en la montaña durante tres años? Tuvo que ser el "Último Eslabón" como castigo porque Leonardo dejó de pagar o para obligar a Eliana a seguir mandando dinero.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">BuscandoAElizabeth</span> Claro. Cuando Daniela mató a Leonardo, cortó la única fuente de ingresos del monstruo. Así que el monstruo se desquitó con Elizabeth y empezó a extorsionar directamente a Eliana con los mensajes de texto.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Justiciero_X</span> Esto significa que Daniela y Eliana pasaron tres años persiguiendo al fantasma de Leonardo, cuando el verdadero enemigo estaba cobrando el dinero de la extorsión en sus narices. Qué maldita genialidad de trama.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Sombra_Narrativa</span> Por eso la nota dice "El secuestro de Elizabeth fue para que yo no encontrara la verdad". El monstruo usó la desaparición de Elizabeth como una cortina de humo para que Daniela culpara a Leonardo y se mataran entre ellos.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CSI_Fanatic</span> @Sombra_Narrativa Exacto. Dividir y vencerás. El "Último Eslabón" se deshizo de Leonardo sin mover un solo dedo, haciendo que Daniela hiciera el trabajo sucio por él.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">AntiHeroina</span> Regresemos al post del escritorio de Morales. Él tenía la silueta del "Objetivo" conectada a la llave del búnker secundario. Si Morales ya sabía todo esto, ¿por qué dejó que Daniela se incriminara sola hoy en el interrogatorio?
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Misterios3000</span> Porque Morales necesitaba la confesión física del asesinato de Leonardo para poder cerrar esa carpeta de 2023. Morales está usando a Daniela para llegar al jefe final.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> ¿Y si Morales ES el "Último Eslabón"? ¿Y si la hija de la que habla la nota es alguien relacionado con la policía? No descarten nada, en este thriller todos mienten.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AntiHeroina</span> @TeoriasLocas Si Morales fuera el villano, no habría dejado esta nota en el expediente oficial. Alguien la filtró para salvar a Daniela de la opinión pública.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Gatita_Fiel</span> Esto se está saliendo de control. Necesitamos el desenlace de la serie en video ya, las notas nos están destruyendo las neuronas de la emoción.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="publicacion_footer">
                            <div class="actions">
                                <button>❤️</button> <button>💬</button>
                            </div>
                            <div class="likes">31,520 Me gusta • 8,420 debates teóricos</div>
                            <input type="text" placeholder="Añade tu teoría sobre el trágico error de Daniela...">
                        </div>
                    </div>
                </div>

                <div class="publicacion">
                    <div class="publicacion_img">
                        <img src="img/personaje.png" alt="Perfil Clasificado - El Último Eslabón">
                    </div>

                    <div class="publicacion_datos">
                        <div class="publicacion_txt">
                            <div class="comment-row">
                                <div class="avatar-estudio"></div>
                                <div class="comment-content">
                                    <span class="user-name">Studios_Oficial</span>
                                    <strong>MATERIAL FILTRADO</strong><br><br>
                                    <strong>[REPORTE DE CAMPO:]</strong><br>¿QUIÉN ES EL OBJETIVO?<br>
                                </div>
                            </div>
                        </div>

                        <div class="publicacion_msj">

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">LoreHunter</span> ¡Miren la etiqueta de la llave! "Búnker - Acceso Secundario". Si Daniela secuestró a Leonardo en el búnker principal, significa que este personaje misterioso tenía las llaves para entrar por detrás sin que nadie se diera cuenta. ¡Es el extorsionador que le pedía dinero a Eliana! Él controlaba el búnker.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> ¡Uff, qué buena hipótesis! Eso explica por qué Elizabeth sobrevivió tres años allí. Leonardo no la alimentaba porque estaba muerto; la alimentaba este tipo, el del "Acceso Secundario", cobrando las extorsiones de Eliana.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">DetectiveSofa</span> Apoyo la teoría. Si miran el diario abierto, tiene el dibujo de un ojo gigante y dice "El último eslabón". Es alguien que estuvo vigilando a Daniela, a Elizabeth y a Leonardo todo este tiempo desde las sombras.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CrimenYJusticia_99</span> ¿Y si las dos fotos que están tachadas a los lados son antiguos socios de Leonardo? Joyas inexplicables, búnkeres secretos... Leonardo andaba en pasos muy oscuros.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">LoreHunter</span> @CrimenYJusticia_99 Exacto. Cuando Daniela mató a Leonardo, este "Objetivo" heredó el control de la situación y se aprovechó del pánico de las hermanas.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Conspiranoico_01</span> Gente, abran los ojos. La placa dice claramente **"DET. MORALES"**. Este no es el tablero de Daniela, ¡este es el escritorio de Morales! ¿Por qué el detective tiene una muestra de las semillas (Item 3A) metida en una bolsa idéntica a la de la Evidencia #2? Morales está metido en el ajo.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CSI_Fanatic</span> Dios... ¿Estás sugiriendo que Morales era el que extorsionaba a Eliana? Por eso la carpeta de la Evidencia #1 se congeló durante tres años. Él mismo desviaba las pistas para culpar a Vanessa la amante.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AnaliZando</span> @CSI_Fanatic Eso tendría un sentido brutal. Por eso Daniela se ve tan aterrada en el post anterior frente al micrófono; no le está declarando a la policía, ¡le está declarando a su propio verdugo! Sabe que Morales la va a silenciar.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">User_Unknown</span> Miren el mapa de abajo, dice "Desarrollo inidentificable" y apunta a una zona remota. Morales localizó a Elizabeth antes que nadie y manipuló los hilos para que Daniela fuera por ella y atraparla en el acto.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Conspiranoico_01</span> Exacto. Morales es el verdadero titiritero de este thriller transmedia. La silueta negra es un reflejo de él mismo.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">BuscandoAElizabeth</span> ¿Y si "El Objetivo" no es un hombre? En los textos del diario la letra parece muy estilizada, casi idéntica a las notas que vimos en el gran muro de hilos rojos. ¿Podría ser un familiar directo de Elizabeth y Eliana que nadie ha mencionado? ¿Una tercera hermana o una madre?
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Gatita_Fiel</span> No creo que sea familia. Las fotos de los costados parecen registros criminales de sospechosos de narcotráfico o contrabando. Leonardo gastaba dinero en joyas que nunca llegaban... ¿y si el "Último Eslabón" es el verdadero proveedor de ese mercado negro?
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">PodcastCriminal</span> Es una gran teoría, @Gatita_Fiel. El arma de la Evidencia 4 no estaba registrada en el sistema. Leonardo le compró la pistola a este tipo misterioso, Daniela la usó para matarlo, y ahora el proveedor busca venganza.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AntiHeroina</span> Sea quien sea, tiene la llave del búnker secundario. Si Elizabeth ya fue rescatada viva, este personaje ya sabe que su búnker fue descubierto y debe estar cazando a Eliana ahora mismo.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">BuscandoAElizabeth</span> ¡Cierto! Eliana sigue libre. El juego de escape transmedia ahora debe enfocarse en salvar a Eliana de este tipo antes de que sea tarde.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Misterios3000</span> ¡Suelten el próximo capítulo ya! Nos están volviendo locos con los detalles del diario. ¿Alguien del canal oficial de Discord ha logrado traducir los textos en latín o garabatos que están debajo del dibujo del ojo? Parece una firma o un código.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Neon_Studios_Oficial</span> <span class="verified-badge">✓</span> Si logran descifrar las coordenadas del mapa inferior izquierdo antes de la medianoche, liberaremos el archivo de audio del interrogatorio de Daniela. Revisen el contraste de la imagen.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CSI_Fanatic</span> ¡DIOS MÍO EL ESTUDIO RESPONDIÓ! Corran todos al servidor de Reddit a escanear el mapa. Las líneas rojas forman vectores geométricos.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Vane_NoCulpable</span> A mí me parece que la firma de abajo del ojo dice "L. N."... ¿Leonardo está vivo? ¿Fingió su muerte con la ayuda de Daniela? ¡Por favor díganme que no!
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Misterios3000</span> @Vane_NoCulpable ¡No juegues con mis sentimientos, Vanessa! Si Leonardo fingió su muerte con la pistola de la Evidencia 4, esta historia acaba de romper la cuarta pared.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="publicacion_footer">
                            <div class="actions">
                                <button>❤️</button> <button>💬</button>
                            </div>
                            <div class="likes">22,410 Me gusta • 5,890 especulaciones</div>
                            <input type="text" placeholder="Escribe tu teoría sobre el Último Eslabón...">
                        </div>
                    </div>
                </div>

                <div class="publicacion">
                    <div class="publicacion_img">
                        <img src="img/foto1-4.png" alt="Daniela G. - Transcripciones Oficiales">
                    </div>

                    <div class="publicacion_datos">
                        <div class="publicacion_txt">
                            <div class="comment-row">
                                <div class="avatar-estudio"></div>
                                <div class="comment-content">
                                    <span class="user-name">Studios_Oficial</span>
                                    <strong>MATERIAL FILTRADO</strong>
                                    <br><br>
                                    "Tres años... Me tomó tres años de mi vida llegar a este maldito cuarto."<br><br>
                                </div>
                            </div>
                        </div>

                        <div class="publicacion_msj">

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Detective_Hacker</span> ¡Miren el papelito amarillo (post-it) en la mesa! Si logras darle la vuelta o hacer zoom invertido, parece que dice 'Daniela Coax' o algo así, y abajo dice 'Viernes 8 PM - Lugar Habitual'. ¡Es la maldita nota de la última cita a la que Elizabeth NUNCA LLEGÓ! Daniela guardó ese post-it durante tres años enteros.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">LoreHunter</span> ¡No te lo puedo creer! Tienes toda la razón. "Lugar habitual" era el restaurante de los viernes. ¿O sea que Daniela llevó la nota al interrogatorio para probarle a la policía que ella sí estaba esperándola y que no es una sospechosa?
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> @LoreHunter O la policía encontró la nota entre las pertenencias que le incautaron a Daniela en el búnker. Me vuela la cabeza que un trozo de papel sea el inicio del rompecabezas.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CrimenYJusticia_99</span> Si dice 'Daniela Coartada' en vez de Coax, significa que la policía ya está asumiendo que esa cena del viernes fue planeada meticulosamente como una distracción.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Detective_Hacker</span> @CrimenYJusticia_99 Exacto, ahí está el truco. La línea entre ser la mejor amiga desesperada o la mente maestra criminal se define en ese papel.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">CSI_Fanatic</span> El reloj del fondo marca las 2:10 o las 10:10. Si es de madrugada, calza con el hecho de que el arresto ocurrió tras el rescate remoto en la montaña de la Evidencia #2. Daniela lleva horas declarando sin dormir, miren sus ojos, está en shock absoluto pero decidida.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AnaliZando</span> Totalmente demacrada. El cabello desordenado, la mirada fija en el detective detrás de cámara. No es la actitud de alguien que está mintiendo, es la mirada de alguien que descargó un peso enorme tras encontrar a Elizabeth viva.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">User_Unknown</span> @AnaliZando O la mirada de alguien que sabe que la atraparon con las manos en la masa y está ejecutando su última carta: culpar al muerto (Leonardo) para salvarse.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">PodcastCriminal</span> Ojo a la carpeta que sostiene. Dice 'DANIELA G. - TRANSCRIPCIONES'. No es el archivo del caso, son las declaraciones que ella misma redactó o los diarios de estos 3 años donde planeó todo.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CSI_Fanatic</span> @PodcastCriminal ¡Puf! Si son sus diarios de estos tres años, la policía tiene ahí la confesión del secuestro y homicidio de Leonardo paso a paso. Ella misma les entregó el caso.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Misterios3000</span> ¿Por qué hay un micrófono analógico tan viejo sobre la mesa si se supone que las salas modernas graban con cámaras ocultas? Esto me hace pensar que no la están interrogando en una comisaría oficial... ¿Y si es un sótano clandestino y la fiscalía es falsa?
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Conspiranoico_01</span> ¡DIOS! Qué tremenda teoría. Tienes razón, la rejilla de ventilación del fondo y las paredes lucen demasiado industriales. ¿Y si Eliana y los extorsionadores la tienen atrapada a ella ahora para sacarle el paradero del dinero de Leonardo?
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">BuscandoAElizabeth</span> @Conspiranoico_01 No creo, la cuenta que lo sube es la "Fiscalía Central" en los posts anteriores. Aunque... en este post el usuario es el estudio de televisión. Podría ser un giro argumental masivo.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Justiciero_X</span> Si miran la carpeta, el gancho clip es de oficina estándar. Daniela tiene el micrófono pegado a la boca porque sabe que la están escuchando desde arriba. Su expresión es de: "Escuchen bien lo que le hice a Leonardo".
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Misterios3000</span> Exacto @Justiciero_X, ella quiere que su versión quede grabada en cinta sí o sí para que no la alteren. Sabe que hay policías corruptos involucrados en el caso desde 2023.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">AntiHeroina</span> Ok, armemos el rompecabezas completo con lo que tenemos: Evidencia 1 (carpeta de desaparición), Evidencia 2 (semillas del escondite), Evidencia 3 (las botas de Daniela en la escena) y Evidencia 4 (el arma). Daniela mató a Leonardo usando la pistola de la Evidencia 4 porque él no quería decirle dónde estaba Elizabeth. Pero con las semillas del auto (Evidencia 2) ella y Eliana la encontraron. ¿Por qué Daniela está presa y Eliana no aparece en la foto?
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">LoreHunter</span> Porque Daniela se sacrificó por segunda vez. Primero hizo el secuestro sola para cuidar la coartada de Eliana, y ahora se entrega sola para que Eliana pueda cuidar a Elizabeth en el hospital.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Gatita_Fiel</span> @LoreHunter Romántico, pero destructivo. Si la policía analiza el tablero de conexiones que vimos antes, Eliana va a caer igual. Las huellas dactilares en la limpieza de la escena del crimen las incriminan a ambas.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Sombra_Narrativa</span> Para mí que Eliana traicionó a Daniela. Le dio las pruebas a la policía para salvarse ella de la acusación de extorsión y le echó toda la culpa del homicidio de Leonardo a Daniela. Por eso la cara de decepción y shock de Daniela en la foto.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AntiHeroina</span> @Sombra_Narrativa ¡BOOM! Esa teoría duele pero encaja demasiado con el tono oscuro de este proyecto transmedia. Nadie es santo aquí.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="publicacion_footer">
                            <div class="actions">
                                <button>❤️</button> <button>💬</button>
                            </div>
                            <div class="likes">14,352 Me gusta • 2,401 comentarios</div>
                            <input type="text" placeholder="Discutir teorías sobre el rompecabezas...">
                        </div>
                    </div>
                </div>

                <div class="publicacion">
                    <div class="publicacion_img">
                        <img src="img/foto6.png" alt="Evidencia Recaudada 4">
                    </div>

                    <div class="publicacion_datos">
                        <!-- Descripción principal de la publicación -->
                        <div class="publicacion_txt">
                            <div class="comment-row">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Fiscalia_Central</span>
                                    <strong>Detalles de la investigacion</strong>
                                    <br>EVIDENCIA RECAUDADA #4<br>
                                </div>
                            </div>
                        </div>

                        <!-- Sección de Mensajes / Comentarios -->
                        <div class="publicacion_msj">

                            <!-- COMENTARIO 1 -->
                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">CrimenYJusticia_99</span> ¿Alguien se fijó en el número de serie de esa pistola? Si supuestamente era el arma personal de Daniela para defensa propia, ¿por qué Leonardo la tenía en su poder durante el secuestro? No me cuadra la teoría del forcejeo.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> Es obvio. Daniela dice que él se liberó parcialmente y la tomó. Pero para mí que ella lo ejecutó a sangre fría y armó la escena.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">DetectiveSofa</span> Totalmente de acuerdo. Un tipo amarrado no se libera tan fácil de un secuestro profesional si no hay complicidad de alguien más.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">LoreHunter</span> No olviden que Eliana también estaba involucrada en el plan original. ¿Y si Eliana estuvo ahí y ella fue la que disparó?
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CrimenYJusticia_99</span> Exacto @LoreHunter, la coartada de la hermana siempre me pareció demasiado perfecta. Esa pistola esconde huellas que no quieren que veamos.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- COMENTARIO 2 -->
                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Forense_Anonimo</span> El informe dice que el disparo fatal fue a corta distancia, pero el ángulo de entrada del proyectil en el cuerpo de Leonardo no coincide con la estatura de Daniela si él estaba sentado o de rodillas.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">User_Unknown</span> ¡Uff! Gran dato. Si el ángulo es descendente, significa que quien disparó estaba de pie y Leonardo estaba completamente indefenso.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AnaliZando</span> O significa que Leonardo estaba encima de ella atacándola. Acuérdense que ella dice que fue un "enfrentamiento".
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Forense_Anonimo</span> @AnaliZando Sí, pero el arma no tiene residuos de pólvora en las manos de Leonardo según las filtraciones de la autopsia. Él nunca la tocó.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AntiHeroina</span> O sea que Daniela mintió en el interrogatorio para alegar legítima defensa. Vaya "amiga" resultó ser.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- COMENTARIO 3 -->
                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">CineYRealidad</span> Esa pistola es una réplica exacta o un modelo muy viejo. ¿De dónde sacó Daniela un arma que no está registrada en el sistema nacional? Eso demuestra que el plan no fue improvisado.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">BuscandoAElizabeth</span> La historia dice que Leonardo tenía gastos inexplicables y joyas que nunca llegaron a su esposa. ¿Y si Leonardo compraba armas en el mercado negro?
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CineYRealidad</span> @BuscandoAElizabeth Buen punto. Quizá Daniela no llevó el arma, sino que la encontró en las pertenencias de Leonardo antes de secuestrarlo.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Vane_NoCulpable</span> Sea como sea, usaron esa misma arma para incriminar a Vanessa (la amante). Menos mal la policía científica hace bien su trabajo.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Misterios3000</span> Si el arma era del mercado negro, es imposible rastrear el historial de disparos previo. Ahí hay más muertos guardados.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- COMENTARIO 4 -->
                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">LaVerdad_SaldraALuz</span> ¿Nadie va a hablar de que Elizabeth apareció viva al final? Si esta pistola mató a Leonardo, y Leonardo sabía dónde estaba Elizabeth... ¿cómo la encontraron Daniela y Eliana si el único que sabía el paradero ya estaba muerto?
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">PodcastCriminal</span> ¡Es la pregunta del millón! Las pistas "vagas" que dio Leonardo antes de morir no bastan para encontrar a alguien en un lugar remoto.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">LaVerdad_SaldraALuz</span> Exacto. Para mí que Elizabeth estaba compinchada con Daniela desde el principio para deshacerse del esposo y quedarse con el dinero.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Justiciero_X</span> No creo. El texto dice que apareció "herida pero con vida". Nadie se hace eso a sí mismo para fingir un secuestro.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> O tal vez la amante, Vanessa, les dio la ubicación a cambio de que no la metieran presa por el asesinato. ¡Todo está conectado!
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Footer de la publicación -->
                        <div class="publicacion_footer">
                            <div class="actions">
                                <button>❤️</button> <button>💬</button>
                            </div>
                            <div class="likes">4,812 Me gusta</div>
                            <input type="text" placeholder="Añadir un comentario...">
                        </div>
                    </div>
                </div>

                <div class="publicacion">
                    <div class="publicacion_img">
                        <img src="img/foto6-1.jpg" alt="Evidencia Recaudada 3">
                    </div>

                    <div class="publicacion_datos">
                        <!-- Descripción principal de la publicación -->
                        <div class="publicacion_txt">
                            <div class="comment-row">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Fiscalia_Central</span>
                                    <strong>Detalles de la investigacion</strong>
                                    <br>EVIDENCIA RECAUDADA #3<br>
                                </div>
                            </div>
                        </div>

                        <!-- Sección de Mensajes / Comentarios -->
                        <div class="publicacion_msj">

                            <!-- COMENTARIO 1 -->
                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Rastreador_Forense</span> Una bota táctica... Eso destruye por completo el argumento de que Daniela fue al búnker a "buscar respuestas" de manera improvisada. Ese tipo de calzado se usa cuando vas preparado para someter a alguien o arrastrar peso.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Misterio_Urbano</span> Totalmente. Nadie sale a cenar un viernes por la noche con botas de asalto. Esto prueba la premeditación del secuestro.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Justicia_Ciega</span> Pero esperen, la historia dice que Daniela ejecutó el plan sola para proteger a Eliana. ¿Y si la huella es del cómplice que le vendió la información?
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Rastreador_Forense</span> @Justicia_Ciega El informe dice que la talla y el desgaste coinciden exactamente con las botas confiscadas en el búnker actual de Daniela. No hay pierde.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Gatita_Fiel</span> Qué fría Daniela... Limpiar todo el lugar pero olvidarse de mirar el suelo donde pisaba. El crimen perfecto no existe.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- COMENTARIO 2 -->
                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Vanessa_Inocente</span> ¡Por fin sale a la luz! Pasé meses siendo la principal sospechosa porque Daniela y Eliana plantaron mis cosas en esa casa. Yo jamás usaría ese tipo de calzado, mi estilo es totalmente diferente.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Hater_Leonardo</span> Tampoco te hagas la santa, Vanessa. Te mudaste a la casa de Elizabeth apenas desapareció. Tan limpia de culpa no estás.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Vanessa_Inocente</span> @Hater_Leonardo Leonardo me mintió, me dijo que se estaban divorciando y ella se había ido por su cuenta. ¡Yo no sabía nada del secuestro!
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Conspiranoico_01</span> Si Daniela plantó evidencia para culpar a Vanessa, debió ser muy meticulosa. Dejar una huella propia parece un error demasiado tonto para alguien tan calculadora.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Luz_Verdad</span> @Conspiranoico_01 Cuando cometes un homicidio y estás bajo la adrenalina del momento, cometes errores. El disparo la hizo entrar en pánico.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- COMENTARIO 3 -->
                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">CSI_Fanatic</span> Hay un vacío temporal enorme. Si la huella se descubrió recientemente, ¿significa que la policía inicial hizo un trabajo terrible inspeccionando la escena hace tres años?
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Forense_Anonimo</span> Probablemente el búnker estaba lleno de pisadas mezcladas y solo se concentraron en las huellas dactilares y el ADN de la amante.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">DetectiveSofa</span> O tal vez alguien dentro de la policía ayudó a desviar la investigación al principio... Acuérdense del dinero de la extorsión que recibía Eliana.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CSI_Fanatic</span> @DetectiveSofa ¡Buen punto! Si había extorsionadores, significa que más personas sabían lo que Leonardo hacía.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> La tecnología de análisis de huellas de pisada avanzó mucho en estos tres años. Reabrieron el caso con nuevas herramientas, por eso cayó Daniela.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- COMENTARIO 4 -->
                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Sombra_Narrativa</span> Lo que no entiendo es: si Daniela y Eliana huyeron juntas cuando el cerco se estrechó... ¿quién llevaba puestas esas botas durante la fuga? ¿Fueron las mismas que usaron para localizar a Elizabeth?
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">BuscandoAElizabeth</span> Si el calzado fue incautado en su detención actual, significa que Daniela usó las mismas botas de la noche del asesinato para ir a rescatar a su amiga. Poético y macabro.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AntiHeroina</span> O una enorme torpeza. Si sabes que la policía te busca, deshacerte de la ropa y zapatos del crimen es la regla número uno.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Sombra_Narrativa</span> @AntiHeroina Tal vez no pudo deshacerse de ellas porque eran su único calzado resistente para entrar al lugar remoto donde tenían oculta a Elizabeth.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">PodcastCriminal</span> Esas botas caminaron por la escena del crimen, por el búnker del secuestro y finalmente por el escondite donde Elizabeth agonizaba. Esa evidencia habla por sí sola.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Footer de la publicación -->
                        <div class="publicacion_footer">
                            <div class="actions">
                                <button>❤️</button> <button>💬</button>
                            </div>
                            <div class="likes">3,921 Me gusta</div>
                            <input type="text" placeholder="Añadir un comentario...">
                        </div>
                    </div>
                </div>

                <div class="publicacion">
                    <div class="publicacion_img">
                        <img src="img/foto6-2.jpg" alt="Evidencia Recaudada 2">
                    </div>

                    <div class="publicacion_datos">
                        <div class="publicacion_txt">
                            <div class="comment-row">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Fiscalia_Central</span>
                                    <strong>Detalles de la investigacion</strong>
                                    <br>EVIDENCIA RECAUDADA #2<br>
                                </div>
                            </div>
                        </div>

                        <div class="publicacion_msj">

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Eco_Detective</span> Brutal el trabajo de botánica forense. Esas semillas parecen de *Ulex europaeus* o alguna variante de zona fría y aislada. Si Leonardo las tenía en el auto, significa que él mismo manejó hasta el escondite para encerrar a Elizabeth antes de que cambiara las llantas.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> ¡Exacto! Por eso cambió las llantas de su auto justo después de la desaparición de su esposa. Quería deshacerse del lodo y la tierra de esa zona.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CrimenYJusticia_99</span> @TeoriasLocas Qué buen ojo. Leonardo pensó que lavando el auto y cambiando los neumáticos borraba todo, pero no contó con que las semillas se quedarían pegadas en las alfombrillas del búnker.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Misterios3000</span> Pero esperen, si Daniela encontró a Elizabeth usando esta evidencia, ¿cómo tuvo acceso a una muestra sellada por la fiscalía? Alguien les filtró el reporte forense mientras huían.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Eco_Detective</span> @Misterios3000 O Eliana usó el dinero de la extorsión para comprar a alguien dentro del laboratorio forense. Ahí hay corrupción.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Luz_Verdad</span> A mí me parece sospechoso que esas semillas estuvieran guardadas en una bolsita plástica dentro de las pertenencias de Daniela si se supone que las recolectó la policía. ¿No será que Daniela ya tenía esa sustancia antes del crimen?
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AnaliZando</span> ¡Ojo con eso! ¿Y si la idea de encerrar a Elizabeth en ese lugar remoto fue de Daniela y no de Leonardo? Nos están vendiendo que Daniela es la heroína que rescata a su amiga.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Justiciero_X</span> @AnaliZando No inventes. Elizabeth era la mejor amiga de Daniela, se veían todos los viernes. Daniela no ganaba nada encerrándola.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Luz_Verdad</span> @Justiciero_X ¿Seguro? Daniela se quedó con el control de todo, manipuló a la hermana (Eliana) y terminó matando al esposo. El panorama le favorece bastante a ella.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AntiHeroina</span> Se nota que la bolsita de la foto tiene la regla pericial al lado. Es una foto oficial de la policía criminal, no algo que Daniela tuviera en su cartera de cosméticos.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">PodcastCriminal</span> Si la policía encontró esta muestra botánica hace tres años en el auto de Leonardo, debieron buscar en esa zona desde el día uno. Elizabeth no habría pasado tres años encerrada sufriendo si hubieran leído bien la evidencia.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">DetectiveSofa</span> Acuérdate de que el caso se cerró rápido porque incriminaron a Vanessa, la amante. Plantaron el arma y la ropa limpia. La policía cerró la carpeta y dejó de buscar.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CSI_Fanatic</span> Triste pero real. Estaban tan felices teniendo a una culpable fácil (Vanessa) que ignoraron las pruebas científicas del suelo y las plantas.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Vane_NoCulpable</span> Gracias a esa incompetencia casi me pudro en la cárcel. Menos mal reabrieron el caso y analizaron esa bendita Evidencia #2.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">PodcastCriminal</span> @Vane_NoCulpable Salvaste el pellejo por un pelo de planta, Vanessa. Literalmente.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Conspiranoico_01</span> Esperen... el texto dice que Elizabeth apareció "herida pero con vida" TRES AÑOS después. ¿Cómo sobrevives tres años en un lugar remoto sola? Alguien la estuvo alimentando. Leonardo estaba muerto, así que tuvo que ser otra persona.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">BuscandoAElizabeth</span> Quizás los extorsionadores que le mandaban mensajes a Eliana eran los encargados de mantenerla cautiva y cuidarla a cambio del dinero.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">LoreHunter</span> Uff, esa teoría tiene demasiado sentido. Leonardo contrató matones para esconderla, y cuando Leonardo murió, los matones siguieron extorsionando a la hermana para no dejar morir a Elizabeth.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Conspiranoico_01</span> @LoreHunter Exacto. Y esa bolsita de semillas pudo caerse del bolsillo de uno de esos extorsionadores durante el forcejeo en el búnker.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> Sea como sea, esa foto de la evidencia desató la caída de toda la red. Qué joya de historia transmedia se están armando.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="publicacion_footer">
                            <div class="actions">
                                <button>❤️</button> <button>💬</button>
                            </div>
                            <div class="likes">5,109 Me gusta</div>
                            <input type="text" placeholder="Añadir un comentario...">
                        </div>
                    </div>
                </div>

                <div class="publicacion">
                    <div class="publicacion_img">
                        <img src="img/evidencia1.png" alt="Evidencia Recaudada 1">
                    </div>

                    <div class="publicacion_datos">
                        <div class="publicacion_txt">
                            <div class="comment-row">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Fiscalia_Central</span>
                                    <strong>Detalles de la investigacion</strong>
                                    <br>EVIDENCIA RECAUDADA #1<br>
                                </div>
                            </div>
                        </div>

                        <div class="publicacion_msj">

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Archivo_Criminal</span> Miren la fecha: 15/10/2023. Eso fue exactamente el fin de semana en que Elizabeth no llegó a la cena con Daniela. Leonardo reportó la desaparición de inmediato para parecer el esposo preocupado, pero el Det. Morales ya sospechaba de las coartadas desde el día uno.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> Totalmente. Esa anotación de "Verificando coartada" al final de la carpeta da un escalofrío... ¿A quién se refería el detective con "<IMAGE 0>"? ¿Sería una foto del auto de Leonardo con las llantas nuevas?
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">DetectiveSofa</span> @TeoriasLocas O tal vez se refería a las cámaras de seguridad del restaurante donde Daniela esperaba a Elizabeth. Ahí se grabó el momento exacto en que Daniela se dio cuenta de que algo andaba mal.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CrimenYJusticia_99</span> Lo increíble es que teniendo esta carpeta abierta con tantas líneas de verificación en la tabla superior, el caso se haya congelado por tres años. Alguien con poder frenó al Det. Morales.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Archivo_Criminal</span> @CrimenYJusticia_99 Totalmente de acuerdo. Leonardo movió hilos o las pistas falsas que plantaron Daniela y Eliana fueron demasiado perfectas para desviarlos.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">LoreHunter</span> ¿Nadie va a hablar de los números de la tabla superior? "V. No. 2023, 2025, 2026, 2027, 2028..." ¡Es una línea de tiempo del caso! Están proyectando registros e inspecciones que llegan incluso hasta los próximos años. El expediente siguió acumulando datos en secreto.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Conspiranoico_01</span> ¡Uff, bien visto! Eso significa que la policía nunca se creyó del todo el cuento de que Vanessa era la única culpable. Siguieron registrando movimientos de Daniela y Eliana año tras año de forma silenciosa.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AnaliZando</span> Claro, por eso cuando el cerco se estrechó hace poco, Daniela y Eliana tuvieron que salir huyendo a buscar a Elizabeth. Sabían que la fiscalía estaba a punto de ejecutar la orden basada en este archivo.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">LoreHunter</span> Exacto. Daniela pensaba que controlaba el juego con sus confesiones en el restaurante, pero estaba atrapada en esta carpeta desde 2023.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Justiciero_X</span> Qué locura de detalle. La frialdad de Daniela se cae a pedazos cuando te das cuenta de que la policía la tenía fichada desde el primer minuto.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Vane_NoCulpable</span> Ver esa carpeta me revuelve el estómago. Mientras el Det. Morales "verificaba coartadas", a mí me estaban destruyendo la vida usándome de chivo expiatorio. Leonardo me metió en su casa y Daniela me plantó las evidencias en bandeja de plata.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AntiHeroina</span> Al menos este expediente impidió que te condenaran a cadena perpetua, Vanessa. La verdad tardó tres años, pero el análisis de esta carpeta te terminó salvando.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Vane_NoCulpable</span> @AntiHeroina Sí, pero el trauma de ser la "amante maldita e incriminada" no me lo quita nadie. Leonardo pagó con su vida, ahora le toca a Daniela pagar en esa sala de interrogatorios.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CSI_Fanatic</span> Lo que sigo sin entender es el rol de Eliana, la hermana. Su nombre no figura en la portada de esta primera evidencia. ¿Cuándo entró ella oficialmente en el radar del Det. Morales?
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Forense_Anonimo</span> @CSI_Fanatic Probablemente cuando denunció los supuestos "mensajes de extorsión". Ahí la policía abrió un anexo dentro de este mismo caso.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">PodcastCriminal</span> ¡La pieza transmedia definitiva! Empezamos viendo el arma (Evidencia 4), luego las pisadas (Evidencia 3), las semillas de la ubicación (Evidencia 2) y terminamos en el origen de todo: la carpeta del caso (Evidencia 1). La cronología está al revés, igual que el relato de Daniela desde el interrogatorio.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">BuscandoAElizabeth</span> Tienes toda la razón. El relato de Daniela nos lleva al pasado, y las evidencias nos hacen hacer el mismo viaje inverso. Qué genialidad de narrativa.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Misterios3000</span> Pero entonces, si Daniela está contando todo esto HOY desde la sala de interrogatorios... ¿el destino de Elizabeth ya está a salvo o sigue en peligro por lo que dice esta carpeta?
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">PodcastCriminal</span> @Misterios3000 El texto dice que la encontraron herida pero viva. El peligro ahora es para Daniela. Ella cerró el ciclo de violencia, pero con esta Carpeta 1, su condena es inevitable.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> A menos que Daniela use el secreto de quiénes eran los extorsionadores para negociar con el fiscal... Esto no ha terminado.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="publicacion_footer">
                            <div class="actions">
                                <button>❤️</button> <button>💬</button>
                            </div>
                            <div class="likes">6,240 Me gusta</div>
                            <input type="text" placeholder="Añadir un comentario...">
                        </div>
                    </div>
                </div>

                <div class="publicacion">
                    <div class="publicacion_img">
                        <img src="img/foto6-3.jpg" alt="El Tablero de Conexiones">
                    </div>

                    <div class="publicacion_datos">
                        <div class="publicacion_txt">
                            <div class="comment-row">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Fiscalia_Central</span>
                                    <strong>ARCHIVO FINAL</strong>
                                    <br>EL MAPA DE LA OBSESIÓN<br>
                                </div>
                            </div>
                        </div>

                        <div class="publicacion_msj">

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">DetectiveSofa</span> ¡Se me puso la piel de gallina! Esto demuestra que Daniela nunca estuvo loca ni actuó por impulso. Estaba haciendo el trabajo que la policía abandonó cuando culparon a la amante. Miren los recortes, analizó hasta la geografía del terreno donde tenían a Elizabeth.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CrimenYJusticia_99</span> Es impresionante. Si te fijas bien en el centro del muro, hay notas sobre la autopsia de Leonardo. Ella misma estaba tratando de cuadrar los ángulos de balística antes de que la atraparan.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> @CrimenYJusticia_99 O tal vez estaba buscando la forma de que el disparo pareciera legítima defensa en su confesión de hoy. Es una estratega brillante.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Justiciero_X</span> Héroe o villana, no cualquiera dedica tres años de su vida a armar un mapa criminalístico para rescatar a alguien. Elizabeth le debe la vida, literalmente.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">DetectiveSofa</span> @Justiciero_X De acuerdo, pero legalmente esto la hunde. Esto prueba premeditación absoluta no solo para el secuestro, sino para la ejecución de Leonardo.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">LoreHunter</span> Esperen un segundo... miren abajo a la derecha en la foto del muro. Hay un boceto médico de un rostro y notas manuscritas sobre "traumatismos". ¿Esos datos de quién son? ¿De Elizabeth en cautiverio o de las heridas de Leonardo?
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Forense_Anonimo</span> Parecen esquemas anatómicos de lesiones antiguas. Si son de Elizabeth, significa que Daniela ya sabía el estado de salud de su amiga antes de llegar al lugar remoto a rescatarla. ¿Cómo obtuvo esos informes médicos en secreto?
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Conspiranoico_01</span> @Forense_Anonimo ¡Los extorsionadores! Daniela interceptó las pruebas de vida que le mandaban a la hermana (Eliana). Usó los bocetos para entender qué tipo de atención médica necesitaría Elizabeth al ser rescatada.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AnaliZando</span> Esto confirma que Eliana y Daniela compartían información de este muro. Imposible que Daniela mantuviera esto oculto en su casa sin que la hermana ayudara a recolectar recortes.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">LoreHunter</span> Exacto. La coartada de la hermana se cae comercialmente. Ambas sabían todo, Daniela solo fue el brazo ejecutor para que Eliana no cayera presa.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">Vane_NoCulpable</span> Al ver este tablero entiendo por qué caí tan fácil. Yo era un peón en su mapa. Me estudió, sabía mis horarios con Leonardo, mi ropa, todo... me usó como un marcador más en su pared para ganar tiempo y que la policía no la molestara mientras investigaba.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">AntiHeroina</span> Es macabro, Vanessa, pero gracias a que ella ganó esos tres años sacrificando tu libertad temporal, Elizabeth hoy está viva. Es un dilema ético tremendo para el caso.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Vane_NoCulpable</span> @AntiHeroina ¡No justifica destruir la vida de otra persona inocente! Ella pudo haberle entregado este maldito muro al Det. Morales en 2023 en lugar de jugar a ser Dios.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">CSI_Fanatic</span> El problema es que el informe dice que la Carpeta #1 de la policía estaba congelada. Si Daniela entregaba esto, Leonardo se habría enterado por sus contactos y habrían matado a Elizabeth de inmediato.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">Misterios3000</span> Buen punto. El muro existió porque el sistema falló. Daniela rompió la ley para romper el silencio.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="avatar"></div>
                                <div class="comment-content">
                                    <span class="user-name">PodcastCriminal</span> ¡Qué manera de cerrar esta experiencia transmedia! Empezamos viendo las pistas sueltas sin entender la escala del plan, y esta foto final une todos los hilos (literalmente). Daniela nos guio por su propia mente a través de este tablero.
                                    <div class="toggle-replies" onclick="this.parentElement.querySelector('.reply-list').classList.toggle('hidden')">
                                        — Ver/Ocultar 4 respuestas
                                    </div>
                                    <div class="reply-list hidden">
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">BuscandoAElizabeth</span> Totalmente. Ahora que Elizabeth está libre y recuperándose, y Daniela en la sala de interrogatorios con este muro como prueba... ¿Qué pasará con Eliana? Ella sigue prófuga.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">LaVerdad_SaldraALuz</span> Apuesto lo que sea a que Eliana está destruyendo la segunda parte de este tablero en otra locación. Daniela se está entregando para que no busquen más allá.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">TeoriasLocas</span> Con este final, el jurado la va a tener muy difícil. ¿Es una asesina calculadora o una justiciera que hizo lo necesario? Qué pedazo de historia.
                                        </div>
                                        <div class="reply-block">
                                            <div class="avatar small"></div><span class="user-name">PodcastCriminal</span> @TeoriasLocas El destino de Daniela sigue incierto, pero este muro de hilos rojos ya quedó grabado en la historia criminal. ¡Fin del juego!
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="publicacion_footer">
                            <div class="actions">
                                <button>❤️</button> <button>💬</button>
                            </div>
                            <div class="likes">8,945 Me gusta</div>
                            <input type="text" placeholder="Añadir un comentario...">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="derecha">
            <div class="contenedor_derecha">
                <div class="titulo_derecha">
                    <p>REGISTROS ENCONTRADOS</p>
                </div>
                <div class="contenedor_fichas_scroll">
                    <div class="ficha">
                        <div class="ficha_tex">
                            <h1>Sospechosos</h1>
                            <h2>Informe basado en los sospechosos</h2>
                            <h3>5 registros</h3>
                        </div>
                        <div class="derecha_img">
                            <img src="img/1.png" alt="Descripción de la imagen">
                        </div>
                    </div>
                    <div class="ficha">
                        <div class="ficha_tex">
                            <h1>Evidencias</h1>
                            <h2>Informe basado en las evidencias</h2>
                            <h3>5 registros</h3>
                        </div>
                        <div class="derecha_img">
                            <img src="img/2.png" alt="Descripción de la imagen">
                        </div>
                    </div>
                    <div class="ficha">
                        <div class="ficha_tex">
                            <h1>Ubicaciones</h1>
                            <h2>Informe de ubicaciones</h2>
                            <h3>5 registros</h3>
                        </div>
                        <div class="derecha_img">
                            <img src="img/3.png" alt="Descripción de la imagen">
                        </div>
                    </div>
                    <div class="ficha">
                        <div class="ficha_tex">
                            <h1>Interrogatorios</h1>
                            <h2>Transcripciones de interrogatorios</h2>
                            <h3>5 registros</h3>
                        </div>
                        <div class="derecha_img">
                            <img src="img/4.png" alt="Descripción de la imagen">
                        </div>
                    </div>
                    <div class="ficha">
                        <div class="ficha_tex">
                            <h1>Proximamente</h1>
                            <h2>Cargando...</h2>
                            <h3>Proximamente</h3>
                        </div>
                        <div class="derecha_img">
                            <img src="img/5.png" alt="Descripción de la imagen">
                        </div>
                    </div>
                    <div class="ficha">
                        <div class="ficha_tex">
                            <h1>Proximamente</h1>
                            <h2>Cargando...</h2>
                            <h3>Proximamente</h3>
                        </div>
                        <div class="derecha_img">
                            <img src="img/5.png" alt="Descripción de la imagen">
                        </div>
                    </div>
                </div>
            </div>
            <div class="contenedor_derecha_img">
                <img src="img/foto8.png" alt="Descripción de la imagen">
            </div>
        </div>
    </div>

</body>

</html>