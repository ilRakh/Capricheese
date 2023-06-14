<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style-manual.css">
    <title>Manual de Usuario Capricheese</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-3 border-bottom border-danger">
        <div class="container-fluid">
        <a href="../index.php" class="navbar-brand"><img src="../../img/logo.png" width="150px" alt=""></a>
        </div>
    </nav>

    
    
    <div class="container-fluid">
        <div class="center">
            <h1 id="manual">Manual de Usuario</h1>
        </div>
        
        <div style="margin-left:5%;">
            <ul>
                <li><strong>Indice:</strong></li>
                <ul>
                    <li><a href="#introduccion">Introducción</a></li>
                    <li><a href="#roles">Roles</a></li>
                    <li><a href="#login">Login</a></li>
                    <li><a href="#barra">Barra de Navegación</a></li>
                    <li><a href="#pagina">Página Principal</a></li>
                    <li><a href="#control">Control de Leche</a></li>
                    <li><a href="#laboratorio">Laboratorio</a></li>
                    <li><a href="#produccion">Producción</a></li>
                    <li><a href="#atmosfera">Atmosfera Curado</a></li>
                    <li><a href="#stock">Stock</a></li>
                    <li><a href="#administracion">Administración</a></li>
                </ul>
            </ul>
        </div>

        <button class="btn btn-danger"><a href="#manual" style="color:black;"><i class='bx bxs-up-arrow'></i></a></button>

        <div class="center">
            <h2 id="introduccion">Introducción</h2>
        </div>
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>En este manual de usuario se mostrará a detalle todas las secciones del sistema diseñado para la fábrica de quesos “Capricheese”. En total son 7 secciones en el sistema, todas con idea y forma propia, intentando no ser repetitivos en la estructura de cada una de ellas.</p>
        </div>

        <br>
        <div class="center">
            <h2 id="roles">Roles</h2>
        </div>
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>El sistema desarrollado cuenta, inicialmente, con 7 roles principales, los cuales son: </p>
            <ul>
                <li>Administrador</li>
                <li>Jefe</li>
                <li>Control de Stock</li>
                <li>Control de Cisterna</li>
                <li>Control de la Atmosfera del Curado</li>
                <li>Producción</li>
                <li>Laboratorio</li>
            </ul>
            
            <p>Cada uno de estos roles representa una forma distinta de ver el sistema, además de cada uno tiene ya un usuario pre-registrado en la base de datos, teniendo solo que ingresar el usuario y contraseña dado por el administrador o jefe de forma escrita o verbal.<br><br>Todos los roles, excepto el rol de Jefe, tienen una sección exclusiva para desarrollar las actividades que corresponden a su zona de trabajo.<br><br>El rol de Jefe es especial, ya que tiene permitido acceder a todas las secciones del programa, excepto la de Administración.</p>
        </div>

        <br>
        <div class="center">
            <h2 id="login">Login</h2>
        </div>
        <img src="img/Login.png" alt="Login" width="40%" style="margin-left: 30%;">
        
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>La sección del login es la primera que se verá en caso de que nunca hayas ingresado al sistema. Es un login con funcionalidades básicas, que sirve más que nada para determinar roles de usuario y variables de sesión que ayudan al funcionamiento del programa.</p>
        </div>

        <div style="margin-left: 5%; margin-right: 5%;">    
            <p>Cuenta con dos campos de texto:</p>
            <ul>
                <li>Usuario: Se ingresa el usuario correspondiente a la sección de trabajo.</li>
                <li>Contraseña: Se ingresa la contraseña correspondiente al usuario anteriormente mencionado.</li>
            </ul>
            <p>El Login cuenta con las validaciones correspondientes.</p>
        </div>


       
        <br>
        <div class="center">
            <h2 id="barra">Barra de Navegación</h2>
        </div>
        <img src="img/BarraNavegación.png" alt="Barra de Navegación" width="80%" style="margin-left: 10%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>En la barra de navegación se muestran las secciones disponibles para el usuario, en este caso para el Jefe, ya que es el que a más secciones puede acceder. También podremos ver el logo y nombre de la fábrica en el extremos izquierdo, así como un botón de Salida en el extremo derecho, que no permite volver al Login.</p>
        </div>


        <br>
        <div class="center">
            <h2 id="pagina">Página Principal</h2>
        </div>
        <img src="img/Main.png" alt="Página Principal" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Esta es la página principal del sistema, donde podremos ver estadísticas y datos muy importantes para la producción del queso.<br><br>Tenemos dos barras de progreso, la izquierda indica el porcentaje de leche restante en la cisterna. Y la de la derecha indica el porcentaje de almacenamiento utilizado del sector de curado<br><br>Lo más importante en esta sección son los cuadros estadísticos. El cuadro de la izquierda mostrará una estadística de calidad de la leche que llega diariamente al establecimiento. Mientras que el cuadro derecho indica la calidad de las tandas de queso que se distribuyen desde la fábrica.</p>
        </div>


        <br>
        <div class="center">
            <h2 id="control">Control de Leche</h2>
        </div>
        <img src="img/ControlLeche.png" alt="Control de Leche" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>En esta sección se realiza el reabastecimiento de las cisternas y el control de la leche que llega diariamente a la fábrica.<br><br>Esta primera imagen muestra un botón rojo el cual, en caso de que las cisternas estén vacías, servirá para solicitar un reabastecimiento de leche.<br><br>También podemos ver dos formas diferentes de visualizar los registros extraídos de la base de datos. El primero de color blanco y con un boton en su extremos derecho, el cual indica un cargamento de leche aun no controlado. Y el segundo de color verde, indicando un cargamento aceptado por el control. En caso de que el cargamento no fuera aceptado se mostrará de color rojo.</p>
        </div>
        
        <img src="img/ControlLecheDatosLeche.png" alt="Control de leche datos" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Si presionamos el botón azul “Datos de leche”, se nos abrirá un modal que mostrará los siguiente datos:</p>
            <ul>
                <li>Litros de leche del cargamento</li>
                <li>Tambo al que pertenece la leche</li>
                <li>Temperatura en la que llegó la leche</li>
                <li>Calidad de la leche</li>
            </ul>
            <p>Estos datos son esenciales para decidir qué hacer con el cargamento de leche.</p>
        </div>
        <img src="img/ControlLecheObservacion.png" alt="Control de leche observacion" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>En caso de querer rechazar el cargamento, se mostrará un segundo modal donde deberá darse una observación y razón del rechazo.</p>
        </div>


        <br>
        <div class="center">
            <h2 id="laboratorio">Laboratorio</h2>
        </div>
        <img src="img/Laboratorio.png" alt="Laboratorio" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>El laboratorio es el lugar donde se desarrollan los fermentos que serán utilizados en la producción del queso más adelante, por lo tanto requieren de un control por parte de los trabajadores de este sector.<br><br>A primera vista podemos ver el botón rojo en la parte superior de la pantalla, el cual sirve para comenzar la elaboración de los fermentos. Como datos, no se podrán empaquetar más de 12 fermentos a la vez<br><br>En esta sección, y como en la anterior, se muestran dos formas de visualizar los registros. En primera instancia se mostrará un cuadro blanco con los datos del fermento fabricado: Peso y Calidad, además de dos botones que servirán para tomar una decisión sobre el fermento dependiendo las características del mismo. Luego de decidir qué hacer con el fermento, el color del cuadro cambiará dependiendo de si fue Empaquetado o Descartado, y se quitaran los botones de toma de decisión.</p>
        </div>


        <br>
        <div class="center">
            <h2 id="produccion">Producción</h2>
        </div>
        <img src="img/Produccion.png" alt="Producción" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>La sección de producción se podría decir que es la unión de los caminos entre la sección de control de leche y la sección de laboratorio. Aquí uniremos los diferentes elementos e ingredientes para por fin realizar una tanda de quesos.<br><br>En esta primera imagen, y como en las anteriores secciones, se visualiza en la parte superior un botón rojo que servirá más tarde para producir el queso.<br><br>En caso de que el queso no haya sido enviado al curado aun, se mostrará un elemento con un botón en su extremo derecho. Caso contrario, se mostrará el elemento con un texto de color rojo indicando que ha sido enviado al sector de curado.<br><br>Ya en la zona inferior podremos ver dos barras, que al igual que en la página principal, la barra de la izquierda indicará el porcentaje de leche en las cisternas, y la barra derecha el porcentaje de almacenamiento utilizado en el sector de curado.</p>
        </div>

        <img src="img/ProduccionModalProducir.png" alt="Modal producir" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Ya habiendo presionado el botón rojo, se desplegará un modal donde se deberán especificar los datos para la producción de la tanda:</p>
            <ul>
                <li>Cantidad de litros de leche que se utilizaran (Solo se pueden seleccionar en unidades de mil).</li>
                <li>Fermento a utilizar (Se indica peso y calidad).</li>
                <li>Tipo de queso a fabricar(Cheddar, Gouda, Provolone, Mascarpone, Mozzarella).</li>
            </ul>
            
            <p>La tanda comenzará a producirse luego de presionar el botón rojo en el modal</p>
        </div>
        <img src="img/ProduccionDatosQueso.png" alt="Datos queso" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Luego de producida la tanda, tendremos acceso a los datos de la misma, como lo son:</p>
            <ul>
                <li>Tipo de queso producido</li>
                <li>Litros de leche utilizados</li>
                <li>Peso del fermento</li>
                <li>Calidad del fermento utilizado</li>
                <li>Peso total de la tanda</li>
            </ul>
            <p>Dentro de este modal también podremos enviar la tanda al curado para su maduración.</p>
        </div>
        <img src="img/ProduccionEnviarCurado.png" alt="Enviar Curado" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>En caso de querer enviar la tanda producida al curado, tendremos que especificar el tipo de curado que queremos para los quesos. Las formas mas típicas de curado son:</p>
            <ul>
                <li>Fresco (7 a 15 días, en algunos casos no se los madura).</li>
                <li>Tierno (20 a 30 días, puede variar más o menos).</li>
                <li>Semicurado (2 a 3 meses).</li>
                <li>Curado (7 meses, en algunos casos, incluso más).</li>
            </ul>
        </div>


        <br>
        <div class="center">
            <h2 id="atmosfera">Atmósfera del Curado</h2>
        </div>
        <img src="img/AtmosferaCuradoBien.png" alt="Atmósfera curado bien" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Esta es una sección muy importante, ya que de esta depende la maduración correcta de nuestros quesos.<br><br>Hay dos formas de visualizar esta sección, en este caso podemos ver como la atmósfera es estable y se muestra en color verde. Cuando la atmósfera es estable, el boton del medio se mostrará de color ver y deshabilitado.<br><br>A continuación se especifican los rangos en el cual la atmósfera es estable y correcta para la maduración de los quesos:</p>
            <ul>
                <li>Temperatura: Entre 6° y 14° es lo estable, pero lo mejor es tener un balance entre 9° y 11°. Caso contrarió, la atmósfera será inestable y deberá corregirse.</li>
                <li>Humedad: Puede depender según el tipo de maduración de los quesos, pero lo ideal fluctúa entre el 75% y 90%. Caso contrarió, deberá estabilizarse.</li>
                <li>Co2: Calculado en ppm, el Co2 es importante mantenerlo entre los 1100ppm y 2300ppm. Si el Co2 sale de ese rango se considera atmósfera inestable.</li>
            </ul>
        </div>

        <img src="img/AtmosferaCuradoMal.png" alt="Atmósfera curado mal" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Aquí podemos ver el cambio visual entre una atmósfera estable y una inestable.<br><br>El principal cambio se da en el color. Además de que ahora el botón central muestra una señal de alerta y está habilitado para el usuario.</p>
        </div>
        <img src="img/AtmosferaCuradoModal.png" alt="Atmósfera curado modal" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Dando click al botón central, se le permitirá al trabajador encargado de la atmósfera estabilizar la misma, solo debe colocar los puntos en un valor dentro de los rangos establecidos como estables y dar click en el botón azul llamado “Estabilizar”.</p>
        </div>


        <br>
        <div class="center">
            <h2 id="stock">Stock</h2>
        </div>
        <img src="img/Stock.png" alt="Stock" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Está sección puede considerarse como paso final en la fabricación, ya aqui decidiremos qué sucede con los quesos luego de cumplir su tiempo de maduración correspondiente.<br><br>En esta primera imagen se puede ver una barra en la zona superior, que indica el porcentaje de almacenamiento utilizado del sector de curado.<br><br>Luego, se visualizan 4 secciones que indican claramente el tipo de curado de los quesos. Dando click a cualquiera de estas secciones tendremos acceso a una subsección que mostrará las tandas de quesos que se han curado específicamente con el tipo de curado seleccionado.</p>
        </div>
        <img src="img/StockEspecifico.png" alt="Stock especifico" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Esta es la parte visual de la subsección mencionada anteriormente. Podremos ver varios datos, como el tipo de queso de la tanda, el tipo de maduración del queso y el peso de la tanda.<br><br>Como cuarto dato podemos ver la calidad, la cual debe ser controlada antes de decidir qué sucede con el queso, debido a que es uno de los datos más importantes a la hora de distribuir o descartar la tanda.<br><br>Luego de controlar la calidad, será posible distribuir o descartar la tanda, como indican los dos botones en los cuadros.<br><br>También se agrega en la parte superior, debajo de la barra, una flecha que permite volver a la sección principal.</p>
        </div>


        <br>
        <div class="center"> 
            <h2 id="administracion">Administración</h2>
        </div>
        <img src="img/Administracion.png" alt="Administración" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Como último, pero no menos importante, encontramos la única sección exclusiva de un usuario dentro del sistema. Ya que la sección de administración es única y de exclusivo acceso para el administrador del sistema.<br><br>En esta sección el administrador podrá tener total control de los usuarios cargados en la base de datos. Podrá agregar nuevos usuarios, así como eliminar y editar los existentes.<br><br>Para agregar un usuario deberá rellenar tres campos: usuario, contraseña y rol del usuario.</p>
        </div>
        <img src="img/AdministracionEditar.png" alt="Administración editar" width="70%" style="margin-left: 15%;">
        <div style="margin-left: 5%; margin-right: 5%;">
            <p>Este es el modal que se abrirá en caso de querer editar un usuario existente dentro de la base de datos. Aquí podrá editar el nombre de usuario y el rol de usuario.</p>
        </div>

    </div>

</body>
</html>