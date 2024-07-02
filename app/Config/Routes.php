<?php

namespace Config;

use App\Models\Municipios;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/encuestas-indicadores-admin', 'EstadisticasIndicadoresAdmin::index');
$routes->get('/estadisticas-admin', 'EstadisticasAdmin::index');
$routes->add('/index', 'Home::index');
$routes->post('index/encuestasCortas', 'Home::encuesta');
//Login
$routes->add('/login', 'Login::index');
$routes->post('/entrar', 'Login::entrar');
$routes->add('/login/salir', 'Login::salir');
$routes->add('/acceso-denegado', 'Login::accesoDenegado');

//Administrador
$routes->add('/crear_cuenta', 'Crear_cuenta::index',  ['filter' => 'sessionAdministrador']);
$routes->post('/guardar', 'Crear_cuenta::guardar',  ['filter' => 'sessionAdministrador']);
$routes->add('/administradorEdit', 'AdministradorEdit::index',  ['filter' => 'sessionAdministrador']);
$routes->get('/administradorEdit/obtener/(:any)', 'AdministradorEdit::obtener/$1',  ['filter' => 'sessionAdministrador']);
$routes->add('/administrador', 'Administrador::index',  ['filter' => 'sessionAdministrador']);
$routes->add('/sajgAdmin', 'SajgAdmin::index',  ['filter' => 'sessionInvestigador']);
$routes->post('/administrador/actualizar', 'Administrador::actualizar',  ['filter' => 'sessionAdministrador']);
$routes->post('administrador/create', 'Administrador::create',  ['filter' => 'sessionAdministrador']);
$routes->get('/administrador/edit/(:any)', 'Administrador::edit/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('administrador/update', 'Administrador::update/$1',  ['filter' => 'sessionAdministrador']);
$routes->get('estadisticas/edit/(:any)', 'EstadisticasAdmin::edit/$1',  ['filter' => 'sessionAdministrador']);
$routes->get('estadisticasAdmin/edit/(:any)', 'EstadisticasAdmin::edit/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('estadisticas-admin/update', 'EstadisticasAdmin::update/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('administrador/createSajg', 'SajgAdmin::createSajg',  ['filter' => 'sessionAdministrador']);
$routes->get('administradorSAJG/edit/(:any)', 'SajgAdmin::editSAJG/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('administradorSAJG/updateSAJG/', 'SajgAdmin::updateSAJG/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('administrador/createSajgPDF', 'SajgAdmin::createSajgPDF',  ['filter' => 'sessionAdministrador']);
$routes->get('/administradorSAJGPDF/editPDF/(:any)', 'SajgAdmin::editPDF/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('administradorSAJG/updateSAJGPDF/', 'SajgAdmin::updateSAJGPDF/$1',  ['filter' => 'sessionAdministrador']);

// Integrantes
$routes->post('administrador/createIntegrante', 'SajgAdmin::createIntegrante',  ['filter' => 'sessionAdministrador']);
$routes->get('administrador/createIntegrante', 'SajgAdmin::createIntegrante',  ['filter' => 'sessionAdministrador']);
$routes->get('administradorIntegrante/edit/(:any)', 'SajgAdmin::editIntegrante/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('administradorIntegrante/updateIntegrante/', 'SajgAdmin::updateIntegrante/$1',  ['filter' => 'sessionAdministrador']);


// Archivos
$routes->group('/', ['MunicipiosAdmin' => 'App\Controllers'], function ($routes) {
    $routes->get('/municipios-admin/editArchivo/(:any)', 'MunicipiosAdmin::editArchivo/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('/municipios-admin/createArchivo', 'MunicipiosAdmin::createArchivo',  ['filter' => 'sessionAdministrador']);
    $routes->post('/municipios-admin/updateArchivo', 'MunicipiosAdmin::updateMunicipioArchivo/$1',  ['filter' => 'sessionAdministrador']);

    $routes->add('/municipios-admin', 'MunicipiosAdmin::index', ['filter' => 'sessionInvestigador']);
    $routes->get('/municipios-admin', 'MunicipiosAdmin::index', ['filter' => 'sessionInvestigador']);
    $routes->add('/archivos-admin', 'MunicipiosAdmin::estadisticas', ['filter' => 'sessionInvestigador']);
    $routes->get('/archivos-admin', 'MunicipiosAdmin::estadisticas', ['filter' => 'sessionInvestigador']);
    $routes->get('municipios-admin/editMunicipio/(:any)', 'MunicipiosAdmin::edit/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('estadisticas-admin/createMunicipioArchivo', 'MunicipiosAdmin::createMunicipioArchivo',  ['filter' => 'sessionAdministrador']);
    $routes->post('estadisticas-admin/updateMunicipioArchivo/', 'MunicipiosAdmin::updateMunicipioArchivo/$1',  ['filter' => 'sessionAdministrador']);

    $routes->get('/municipios-admin/editArchivoEstado/(:any)', 'EstadosAdmin::editArchivo/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('estadisticas-admin/createEstadoArchivo', 'EstadosAdmin::createEstadoArchivo',  ['filter' => 'sessionAdministrador']);
    $routes->post('estadisticas-admin/updateEstadoArchivo/', 'EstadosAdmin::updateEstadoArchivo/$1',  ['filter' => 'sessionAdministrador']);
});

//Cendoc
$routes->group('/', ['Cendoc' => 'App\Controllers'], function ($routes) {
    $routes->add('/cendoc', 'Cendoc::index');
    $routes->get('/cendoc/editDoc/(:any)', 'Cendoc::editDoc/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('/cendoc/createDoc', 'Cendoc::createDoc',  ['filter' => 'sessionAdministrador']);
    $routes->post('/cendoc/updateDoc', 'Cendoc::updateDoc/$1',  ['filter' => 'sessionAdministrador']);
    // Categorias
    $routes->post('cendoc/createCategoriaDoc', 'Cendoc::createCategoriaDoc',  ['filter' => 'sessionAdministrador']);
    $routes->get('cendoc/editCategoriaCendoc/(:any)', 'Cendoc::edit/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('cendoc/updateCategoriaDocumento/', 'Cendoc::updateCategoriaDocumento/$1',  ['filter' => 'sessionAdministrador']);
    // Fisicos
    $routes->get('/cendoc/editDocFisico/(:any)', 'Cendoc::editDocFisico/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('/cendoc/createDocFisico', 'Cendoc::createDocFisico',  ['filter' => 'sessionAdministrador']);
    $routes->post('/cendoc/updateDocFisico', 'Cendoc::updateDocFisico/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('/cendoc/agregarVisitaCendocDigital', 'Cendoc::agregarVisitaCendocDigital');
});
$routes->get('/centro_documental', 'Centro_documental::ByNombre');
$routes->post('/centro-documental', 'Centro_documental::ByNombre');

// $routes->group('/banco-datos', ['namespace' => 'App\Controllers'], function($routes) {
//     // Index route
//     $routes->get('/', 'BancoDatos::index');

//     // Example route '/banco-datos/a'
//     $routes->get('/a', 'BancoDatos::a'); // Replace 'a' with your actual method name in BancoDatos controller
// });

$routes->get('/banco-datos', 'BancoDatos::index', ['filter' =>  'sessionInvestigador']);
$routes->post('/banco-datos/create-categoria', 'BancoDatos::createCategoria', ['filter' =>  'sessionInvestigador']);
$routes->post('/banco-datos/create-subcategoria', 'BancoDatos::createSubcategoria', ['filter' =>  'sessionInvestigador']);
$routes->post('/banco-datos/create-region', 'BancoDatos::createRegion');
$routes->post('/banco-datos/create-doc', 'BancoDatos::createDocBanco');
$routes->get('/banco-datos/editar-doc/(:any)', 'BancoDatos::editDocumento/$1', ['filter' =>  'sessionInvestigador']);
$routes->post('/banco-datos/editar-doc/(:any)', 'BancoDatos::editDocumentoPost/$1', ['filter' =>  'sessionInvestigador']);
$routes->get('/banco-datos/editar-categoria/(:any)', 'BancoDatos::editCategoria/$1', ['filter' =>  'sessionInvestigador']);
$routes->post('/banco-datos/editar-categoria/(:any)', 'BancoDatos::editCategoriaPost/$1', ['filter' =>  'sessionInvestigador']);
$routes->get('/banco-datos/editar-subcategoria/(:any)', 'BancoDatos::editSubcategoria/$1', ['filter' =>  'sessionInvestigador']);
$routes->post('/banco-datos/editar-subcategoria/(:any)', 'BancoDatos::editSubcategoriaPost/$1', ['filter' =>  'sessionInvestigador']);
$routes->get('/banco-datos/editar-region/(:any)', 'BancoDatos::editRegion/$1', ['filter' =>  'sessionInvestigador']);
$routes->post('/banco-datos/editar-region/(:any)', 'BancoDatos::editRegionPost/$1', ['filter' =>  'sessionInvestigador']);
$routes->get('/banco-datos/get-subcategorias', 'BancoDatos::getSubcategoriasOptions');
$routes->get('/banco-datos/get-doc-details', 'BancoDatos::getDocDetails', ['filter' =>  'sessionInvestigador']);
$routes->get('/banco-datos/browse', 'BancoDatos::browseCategories', ['filter' =>  'sessionInvestigador']);
$routes->get('/banco-datos/browse/search', 'BancoDatos::browseDocumentsSearch', ['filter' =>  'sessionInvestigador']);
$routes->get('/banco-datos/browse/categorias/(:any)', 'BancoDatos::browseSubcategories/$1', ['filter' =>  'sessionInvestigador']);
$routes->get('/banco-datos/browse/subcategorias/(:any)', 'BancoDatos::browseDocuments/$1', ['filter' =>  'sessionInvestigador']);

// Revista
$routes->get('/revistass', 'Revistas::index');
$routes->get('/revistas/(:any)', 'Revistas::verRevista/$1');
$routes->get('/revistas-admin', 'Revistas::revistasAdmin');
$routes->post('/revistas-admin/crearRevista', 'Revistas::crearRevista',  ['filter' => 'sessionAdministrador']);
$routes->get('/revistas-admin/editarRevista/(:any)', 'Revistas::editarRevista/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('/revistas-admin/actualizarRevista', 'Revistas::actualizarRevista',  ['filter' => 'sessionAdministrador']);

$routes->post('/revistas-admin/crearArticuloRevista', 'Revistas::crearArticuloRevista',  ['filter' => 'sessionAdministrador']);
$routes->get('/revistas-admin/editarArticuloRevista/(:any)', 'Revistas::editarArticuloRevista/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('/revistas-admin/actualizarArticuloRevista', 'Revistas::actualizarArticuloRevista',  ['filter' => 'sessionAdministrador']);



//Estadisticas 
$routes->get('/estadisticas/(:any)', 'Estadisticas::index/$1');
$routes->get('/estadisticasMunicipio/(:any)', 'Estadisticas::municipio/$1');
$routes->get('/estadisticasCategoria/(:any)', 'Estadisticas::categoria/$1');
$routes->get('/estadisticasBusqueda', 'Estadisticas::busqueda');
$routes->post('/estadisticasBusqueda', 'Estadisticas::busqueda');
$routes->get('/estadisticasAdmin/(:any)', 'EstadisticasAdmin::index/$string');
$routes->post('estadisticas', 'EstadisticasIndicadores::ByNombre');


$routes->get('/estadisticasEstado/(:any)', 'Estadisticas::estado/$1');

//Propuesta 
$routes->group('/', ['Acciones' => 'App\Controllers'], function ($routes) {
    $routes->add('/accion', 'Acciones::index');
    $routes->post('propuesta/create/', 'Acciones::create');
    $routes->post('propuesta/contact/', 'Acciones::contacto');
});

// Interfaz
$routes->get('/configs/editConfig/(:any)', 'InterfazController::editConfig/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('/configs/updateConfig', 'InterfazController::updateConfig/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('/configs/createConfig', 'InterfazController::createConfig',  ['filter' => 'sessionAdministrador']);

//Apoyos y Servicios 
$routes->group('/', ['Apoyos' => 'App\Controllers'], function ($routes) {
    $routes->add('/apoyos_servicios', 'Apoyos::index');
    $routes->post('apoyos/buscar', 'Apoyos::Buscar');
    $routes->add('/apoyosAdmin', 'ApoyosAdmin::Index');
    $routes->post('apoyosAdmin/createDerecho', 'ApoyosAdmin::createDerecho',  ['filter' => 'sessionAdministrador']);
    $routes->post('apoyosAdmin/createDependencia', 'ApoyosAdmin::createDependencia',  ['filter' => 'sessionAdministrador']);
    $routes->post('apoyosAdmin/createTipoApoyo', 'ApoyosAdmin::createTipoApoyo',  ['filter' => 'sessionAdministrador']);
    $routes->get('/apoyosAdmin/editDerecho/(:any)', 'ApoyosAdmin::editDerecho/$1',  ['filter' => 'sessionAdministrador']);
    $routes->get('/apoyosAdmin/editTApoyo/(:any)', 'ApoyosAdmin::editTApoyo/$1',  ['filter' => 'sessionAdministrador']);
    $routes->get('/apoyosAdmin/editDependencia/(:any)', 'ApoyosAdmin::editDependencia/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('apoyosAdmin/updateTApoyo/', 'ApoyosAdmin::updateTApoyo/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('apoyosAdmin/updateDependencia/', 'ApoyosAdmin::updateDependencia/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('apoyosAdmin/updateDerecho/', 'ApoyosAdmin::updateDerecho/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('apoyosAdmin/createApoyo', 'ApoyosAdmin::createApoyo',  ['filter' => 'sessionAdministrador']);
    $routes->get('apoyosAdmin/editNormatividad/(:any)', 'ApoyosAdmin::editNormatividad/$1',  ['filter' => 'sessionAdministrador']);
    $routes->get('apoyosAdmin/editApoyo/(:any)', 'ApoyosAdmin::editApoyo/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('apoyosAdmin/updateNormatividad/', 'ApoyosAdmin::updateNormatividad/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('apoyosAdmin/updateApoyo/', 'ApoyosAdmin::updateApoyo/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('apoyosAdmin/createNormatividad', 'ApoyosAdmin::createNormatividad',  ['filter' => 'sessionAdministrador']);
});

//Juventudes
$routes->group('/', ['Consejo' => 'App\Controllers'], function ($routes) {
    $routes->add('/consejo', 'Consejo::index');
});

//Directorio
$routes->group('/', ['Directorio' => 'App\Controllers'], function ($routes) {
    $routes->add('/directorio', 'Directorio::index');
});


//Investigaciones
$routes->group('/', ['Investigaciones' => 'App\Controllers'], function ($routes) {

    $routes->add('/centro-documental', 'Centro_documental::index');
    $routes->add('/centro-documental-fisico', 'Centro_documental::fisico');
    $routes->get('/centro-documental-fisico', 'Centro_documental::fisico');
    $routes->post('/centro-documental-fisico/nombre', 'Centro_documental::FisicoByNombre');
    $routes->post('/centro-documental-fisico/clave', 'Centro_documental::FisicoByClave');
    $routes->post('/centro-documental-fisico/editorial', 'Centro_documental::FisicoByEditorial');


    $routes->add('/red-investigadores', 'Red_Investigadores::index');
    $routes->add('/red-investigadores-edit', 'Red_investigadores_edit::index',  ['filter' => 'sessionAdministrador']);
});


//Temas 
$routes->group('/', ['Tema' => 'App\Controllers'], function ($routes) {
    $routes->add('/temas', 'Tema::index');
    $routes->post('temas/createTema', 'Tema::createTema',  ['filter' => 'sessionAdministrador']);
    $routes->get('/temas/edit/(:any)', 'Tema::edit/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('/temas/update/', 'Tema::update/$1',  ['filter' => 'sessionAdministrador']);
    $routes->get('/temas_admin_edit', 'Tema_edit::index',  ['filter' => 'sessionAdministrador']);
    $routes->add('/temasView', 'Temass::index');
    $routes->post('temasView/Search', 'Temass::Search');
});

//Estadisticas e indicadores 
$routes->add('/estadisticas', 'EstadisticasIndicadores::index');
$routes->post('/estadisticasCendoc', 'Cendoc::ByNombre');
$routes->get('/estadisticas e indicadores', 'EstadisticasIndicadores::index');

//Encuestas
$routes->group('/', ['Encuesta' => 'App\Controllers'], function ($routes) {
    $routes->add('/encuestas-admin', 'EncuestasAdmin::index');
    $routes->get('/encuestas-admin/edit/(:any)', 'EncuestasAdmin::edit/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('/encuestas-admin/update/', 'EncuestasAdmin::update/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('encuestas-admin/create', 'EncuestasAdmin::create',  ['filter' => 'sessionAdministrador']);
    $routes->get('/encuestas-admin/editPregunta/(:any)', 'EncuestasAdmin::editP/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('/encuestas-admin/updatePregunta/', 'EncuestasAdmin::updateP/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('/encuestas-admin/deletePregunta/(:any)', 'EncuestasAdmin::deleteP/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('encuestas-admin/createPregunta', 'EncuestasAdmin::createP',  ['filter' => 'sessionAdministrador']);
    $routes->post('encuestas-admin/createEncuestaL', 'EncuestasAdmin::createL',  ['filter' => 'sessionAdministrador']);
    $routes->get('encuestas-admin/editEncuestaLarga/(:any)', 'EncuestasAdmin::editL/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('/encuestas-admin/deleteEncuestaLarga/(:any)', 'EncuestasAdmin::deleteL/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('encuestas-admin/updateEncuestaLarga/', 'EncuestasAdmin::updateL/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('/encuestas-admin/deleteTestimonio/(:any)', 'EncuestasAdmin::deleteT/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('encuestas-admin/updateTestimonio/', 'Home::updateT/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('encuestas-admin/updateTestimonio2/', 'Home::updateT2/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('encuestas-admin/createTestimonio', 'Home::createT');
    $routes->get('encuestas-admin/editTestimonio/(:any)', 'Home::editT/$1',  ['filter' => 'sessionAdministrador']);
});

//Investigadores
$routes->group('/', ['Investigadores' => 'App\Controllers'], function ($routes) {
    $routes->add('/integrantes-investigadores', 'Integrantes_investigadores::index');
    $routes->get('integrantes-investigadores/edit/(:any)', 'Red_investigadores_edit::editInv/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('integrantes-investigadores/createInv', 'Red_investigadores_edit::createInv',  ['filter' => 'sessionAdministrador']);
    $routes->post('integrantes-investigadores/update/', 'Red_investigadores_edit::updateInv/$1',  ['filter' => 'sessionAdministrador']);
    $routes->get('/edit_integrante', 'Edit_integrantes::index');
    $routes->get('objetivos-investigadores/edit/(:any)', 'Red_investigadores_edit::editObj/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('objetivos-investigadores/createObj', 'Red_investigadores_edit::createObj',  ['filter' => 'sessionAdministrador']);
    $routes->post('objetivos-investigadores/update/', 'Red_investigadores_edit::updateObj/$1',  ['filter' => 'sessionAdministrador']);
    $routes->get('/edit-objetivos', 'Edit-objetivos::index');
    $routes->get('comisiones-investigadores/edit/(:any)', 'Red_investigadores_edit::editComTrab/$1',  ['filter' => 'sessionAdministrador']);
    $routes->post('comisiones-investigadores/createComTrab', 'Red_investigadores_edit::createComTrab',  ['filter' => 'sessionAdministrador']);
    $routes->post('comisiones-investigadores/update/', 'Red_investigadores_edit::updateComTrab/$1',  ['filter' => 'sessionAdministrador']);
    $routes->get('/edit-comisiones', 'Edit-comisiones::index');
});

//Testimonios 
$routes->add('/testimoniosAdmin', 'Testimonio::Index');
$routes->get('testimonio/editTestimonio/(:any)', 'Home::editT2/$1',  ['filter' => 'sessionAdministrador']);

//Organizaciones
$routes->add('/directoriosAdmin', 'Organizacion::Index');
$routes->post('directoriosAdmin/createOrganizacion', 'Organizacion::createOrganizacion',  ['filter' => 'sessionAdministrador']);
$routes->post('directoriosAdmin/updateOrganizacion/', 'Organizacion::updateOrganizacion/$1',  ['filter' => 'sessionAdministrador']);
$routes->get('directoriosAdmin/editOrganizacion/(:any)', 'Organizacion::editOrganizacion/$1',  ['filter' => 'sessionAdministrador']);


//Gráficas
$routes->add('/graficas-admin', 'Graficas::index');
$routes->post('/graficas-admin/crearGrafica', 'Graficas::crearGrafica',  ['filter' => 'sessionAdministrador']);
$routes->get('/graficas-admin/agregarDatosGrafica/(:any)', 'Graficas::agregarDatosGrafica/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('/graficas-admin/agregarDatosGrafica', 'Graficas::importCsvToDb',  ['filter' => 'sessionAdministrador']);
$routes->get('/graficas-admin/editarGrafica/(:any)', 'Graficas::editarGrafica/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('/graficas-admin/actualizarGrafica', 'Graficas::actualizarGrafica',  ['filter' => 'sessionAdministrador']);
$routes->get('/graficas-admin/editarDatosGrafica/(:any)', 'Graficas::editarDatosGrafica/$1',  ['filter' => 'sessionAdministrador']);
$routes->post('/graficas-admin/actualizarDatosGrafica', 'Graficas::actualizarDatosGrafica',  ['filter' => 'sessionAdministrador']);



//Contactanos
$routes->post('/Contactanos/EnviarMensaje', 'Contactanos::EnviarMensaje');
$routes->add('/contactanos', 'Contactanos::index');
$routes->post('/Contactanos/EnviarCorreo', 'Contactanos::EnviarCorreo');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
