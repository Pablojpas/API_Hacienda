<?php

/** @file module.php
 * A brief file description.
 * A more elaborated file description.
 */
/** \addtogroup Core
 *  @{
 */
/**
 * \defgroup Module
 *
 * @{
 */
global $compannyUser;

/**
 * Boot up procedure
 */
function facturador_bootMeUp()
{
    // Just booting up
    companny_users_loadCurrentUser();
}

function companny_users_loadCurrentUser()
{
    global $compannyUser;

    // If I am running on emebed mode I don't have any users, so I will just load it from the session
    $user = users_load(['userName' => params_get('iam', '')]);
    /*
      if(conf_get('embeded', 'core', false)){
      $user = users_createBasic();
      $tmpUserId = users_confirmSessionKey();
      $user->idUser = $tmpUserId;
      }else{
      }
     */
}

/**
 * Init function
 */
function facturador_init()
{

    $paths = [
        [
            'r' => 'info',
            'action' => 'module_info',
            'access' => 'users_openAccess',
            'access_params' => 'accessName',
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'copy_master_tables',
            'action' => 'copyMasterTables',
            'access' => 'users_loggedIn',
            'access_params' => 'accessName',
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'companny_add_master_Consecutive',
            'action' => 'companny_add_master_Consecutive',
            'access' => 'users_loggedIn',
            'access_params' => 'accessName',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'idUser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'getSucursales',
            'action' => 'getSucursales',
            'access' => 'users_loggedIn',
            'access_params' => 'accessName',
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'addSucursales',
            'action' => 'addSucursales',
            'access' => 'users_loggedIn',
            'access_params' => 'accessName',
            'params' => [
                ['key' => 'numeroSucursal', 'def' => '', 'req' => true],
                ['key' => 'nombreSucursal', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'add_terminal',
            'action' => 'addTerminal',
            'access' => 'users_loggedIn',
            'access_params' => 'accessName',
            'params' => [
                ['key' => 'numeroTerminal', 'def' => '', 'req' => true],
                ['key' => 'nombreTerminal', 'def' => '', 'req' => true],
                ['key' => 'idSucursal', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'getTerminales',
            'action' => 'getTerminales',
            'access' => 'users_loggedIn',
            'access_params' => 'accessName',
            'params' => [
                ['key' => 'idSucursal', 'def' => '', 'req' => false],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'getUserPermissionById',
            'action' => 'getUserPermissionById',
            'access' => 'users_loggedIn',
            'access_params' => 'accessName',
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'getUsersCompanny',
            'action' => 'getUsersCompanny',
            'access' => 'users_loggedIn',
            'access_params' => 'accessName',
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_active_receiver',
            'action' => 'getActiveReceiver',
            'access' => 'companny_users_loggedIn',
            'access_params' => 'accessName',
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_receiver_by_id',
            'action' => 'getReceiverById',
            'access' => 'companny_users_loggedIn',
            'access_params' => 'accessName',
            'params' => [
                ['key' => 'idReceptor', 'def' => '', 'req' => true],
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_vouchers',
            'action' => 'getVouchers',
            'access' => 'companny_users_loggedIn',
            'access_params' => 'accessName',
            'params' => [
                ['key' => 'env', 'def' => '', 'req' => true],
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'getProductByCode',
            'action' => 'getProductByCode',
            'access' => 'companny_users_loggedIn',
            'access_params' => 'accessName',
            'params' => [
                ['key' => 'codigo', 'def' => '', 'req' => true],
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'sucursal', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_inventory',
            'action' => 'getInventory',
            'access' => 'companny_users_loggedIn',
            'access_params' => 'accessName',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'sucursal', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'backup_user',
            'action' => 'backUpUser',
            'access' => 'users_loggedIn',
            'access_params' => 'accessName',
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_all_privinces',
            'action' => 'getAllProvinces',
            'access' => 'users_openAccess',
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_type_of_id',
            'action' => 'getTypeOfId',
            'access' => 'users_openAccess',
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_cantons',
            'action' => 'getCantons',
            'access' => 'users_openAccess',
            'params' => [
                ['key' => 'idProvince', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_district',
            'action' => 'getDistrict',
            'access' => 'users_openAccess',
            'params' => [
                ['key' => 'idProvince', 'def' => '', 'req' => true],
                ['key' => 'idCanton', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'delete_reciver',
            'action' => 'deleteReciver',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'idReceptor', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'company_stag_users',
            'action' => 'companyStagUsers',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'userName', 'def' => '', 'req' => true],
                ['key' => 'password', 'def' => '', 'req' => true],
                ['key' => 'pinCerti', 'def' => '', 'req' => true],
                ['key' => 'downloadCode', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'company_change_env',
            'action' => 'companyChangeEnv',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'envProduccion', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'company_get_env',
            'action' => 'companyGetEnv',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'company_get_env',
            'action' => 'companyGetEnv',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasteruser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'company_prod_users',
            'action' => 'companyProdUsers',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'userName', 'def' => '', 'req' => true],
                ['key' => 'password', 'def' => '', 'req' => true],
                ['key' => 'pinCerti', 'def' => '', 'req' => true],
                ['key' => 'downloadCode', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_stag_credentials',
            'action' => 'getStagCredentials',
            'access' => 'users_loggedIn',
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_prod_credentials',
            'action' => 'getProdCredentials',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_prod_companny_credentials',
            'action' => 'getProdCompannyCredentials',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'add_companny_reciver',
            'action' => 'addCompannyReciver',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'nombreCliente', 'def' => '', 'req' => true],
                ['key' => 'numeroCedula', 'def' => '', 'req' => true],
                ['key' => 'tipoCedula', 'def' => '', 'req' => true],
                ['key' => 'telefono', 'def' => '', 'req' => false],
                ['key' => 'idProvincia', 'def' => '', 'req' => true],
                ['key' => 'idCanton', 'def' => '', 'req' => true],
                ['key' => 'idDistrito', 'def' => '', 'req' => true],
                ['key' => 'idBarrio', 'def' => '', 'req' => true],
                ['key' => 'otrasSenas', 'def' => '', 'req' => true],
                ['key' => 'nombreComercial', 'def' => '', 'req' => true],
                ['key' => 'correoPrincipal', 'def' => '', 'req' => false],
                ['key' => 'copiasCorreo', 'def' => '', 'req' => false],
                ['key' => 'numeroFax', 'def' => '', 'req' => false],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_stag_companny_credentials',
            'action' => 'getStagCompannyCredentials',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'companny_add_voucher',
            'action' => 'companny_add_voucher',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'clave', 'def' => '', 'req' => true],
                ['key' => 'consecutivo', 'def' => '', 'req' => true],
                ['key' => 'estado', 'def' => '', 'req' => true],
                ['key' => 'xmlEnviadoBase64', 'def' => '', 'req' => true],
                ['key' => 'tipoDocumento', 'def' => '', 'req' => true],
                ['key' => 'respuestaMHBase64', 'def' => '', 'req' => false],
                ['key' => 'idReceptor', 'def' => '', 'req' => false],
                ['key' => 'env', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'companny_updateConsecutive',
            'action' => 'companny_updateConsecutive',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'tipoDocumento', 'def' => '', 'req' => true],
                ['key' => 'env', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_companny_information',
            'action' => 'getCompannyInformation',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_companny_information_admin',
            'action' => 'getCompannyInformationAdmin',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'compannyUpdateTipoCambio',
            'action' => 'compannyUpdateTipoCambio',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'tipoCambio', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'compannyUpdateLocation',
            'action' => 'compannyUpdateLocation',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'idProvincia', 'def' => '', 'req' => true],
                ['key' => 'idCanton', 'def' => '', 'req' => true],
                ['key' => 'idDistrito', 'def' => '', 'req' => true],
                ['key' => 'idBarrio', 'def' => '', 'req' => true],
                ['key' => 'sennas', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'compannyUpdateInformation',
            'action' => 'compannyUpdateInformation',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'nombre', 'def' => '', 'req' => true],
                ['key' => 'nombreComercial', 'def' => '', 'req' => true],
                ['key' => 'email', 'def' => '', 'req' => true],
                ['key' => 'codigoPais', 'def' => '', 'req' => true],
                ['key' => 'fax', 'def' => '', 'req' => false],
                ['key' => 'tipoCedula', 'def' => '', 'req' => false],
                ['key' => 'cedula', 'def' => '', 'req' => false],
                ['key' => 'telefono', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'getCompannyLocationInformation',
            'action' => 'getCompannyLocationInformation',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'idProvincia', 'def' => '', 'req' => true],
                ['key' => 'idCanton', 'def' => '', 'req' => true],
                ['key' => 'idDistrito', 'def' => '', 'req' => true],
                ['key' => 'idBarrio', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'get_neighborhood',
            'action' => 'getNeighborhood',
            'access' => 'users_openAccess',
            'params' => [
                ['key' => 'idProvince', 'def' => '', 'req' => true],
                ['key' => 'idCanton', 'def' => '', 'req' => true],
                ['key' => 'idDistrito', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'inser_to_log_table',
            'action' => 'insertToLogTable',
            'access' => 'users_loggedIn',
            'access_params' => 'accessName',
            'params' => [
                ['key' => 'json', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'companny_getMyInfo',
            'action' => 'companny_getMyInfo',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'companny_users_getMyDetails',
            'action' => 'companny_users_getMyDetails',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'companny_user.php',
        ],
        [
            'r' => 'companny_getMyConsecutive',
            'action' => 'companny_getMyConsecutive',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'tipoComprobante', 'def' => '', 'req' => true],
                ['key' => 'env', 'def' => '', 'req' => true],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'companny_users_register',
            'action' => 'companny_users_registerNew',
            'access' => 'users_loggedIn',
            'params' => [
                ['key' => 'fullName', 'def' => '', 'req' => true],
                ['key' => 'userName', 'def' => '', 'req' => true],
                ['key' => 'email', 'def' => '', 'req' => true],
                ['key' => 'about', 'def' => '', 'req' => false],
                ['key' => 'country', 'def' => '', 'req' => true],
                ['key' => 'pwd', 'def' => '', 'req' => true],
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'companny_user.php',
        ],
        [
            'r' => 'companny_users_get_my_details',
            'action' => 'companny_users_getMyDetails',
            'access' => 'companny_users_loggedIn',
            'params' => [['key' => 'idMasterUser', 'def' => '', 'req' => false]],
            'file' => 'companny_user.php',
        ],
        [
            'r' => 'get_tipo_impuesto',
            'action' => 'getTipoImpuesto',
            'access' => 'companny_users_loggedIn',
            'params' => [['key' => 'idMasterUser', 'def' => '', 'req' => false]],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'getUnid',
            'action' => 'getUnid',
            'access' => 'companny_users_loggedIn',
            'params' => [['key' => 'idMasterUser', 'def' => '', 'req' => false]],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'addInventaryProduct',
            'action' => 'addInventaryProduct',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => false],
                ['key' => 'nombre', 'def' => '', 'req' => false],
                ['key' => 'descripcion', 'def' => '', 'req' => false],
                ['key' => 'unidadMedida', 'def' => '', 'req' => false],
                ['key' => 'precioVenta', 'def' => '', 'req' => false],
                ['key' => 'idImpuesto', 'def' => '', 'req' => false],
                ['key' => 'cantidadImpuesto', 'def' => '', 'req' => false],
                ['key' => 'codigoBarras', 'def' => '', 'req' => false],
                ['key' => 'disponible', 'def' => '', 'req' => false],
                ['key' => 'sucursal', 'def' => '', 'req' => false],
            ],
            'file' => 'facturadorCRLibre.php',
        ],
        [
            'r' => 'companny_users_recover_pwd',
            'action' => 'companny_users_recoverPwd',
            'access' => 'companny_users_openAccess',
            'params' => [
                ['key' => 'userName', 'def' => '', 'req' => true],
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'companny_user.php',
        ],
        [
            'r' => 'companny_users_update_profile',
            'action' => 'companny_users_updateProfile',
            'access' => 'companny_users_loggedIn',
            'file' => 'companny_user.php',
        ],
        [
            'r' => 'users_log_me_out',
            'action' => 'companny_users_logMeOut',
            'access' => 'companny_users_loggedIn',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
            ],
            'file' => 'companny_user.php',
        ],
        [
            'r' => 'companny_users_logMeIn',
            'action' => 'companny_users_logMeIn',
            'access' => 'companny_users_openAccess',
            'params' => [
                ['key' => 'idMasterUser', 'def' => '', 'req' => true],
                ['key' => 'userName', 'def' => '', 'req' => true],
                ['key' => 'pwd', 'def' => '', 'req' => true],
            ],
            'file' => 'companny_user.php',
        ],
    ];

    return $paths;
}

/* * *********************************************** */
// In the access you can use users_openAccess if you want anyone can use the function
// or users_loggedIn if the user must be logged in
/* * *********************************************** */

/**
 * Get the perms for this module
 */
function fileUploader_access()
{

    $perms = [
        [
            // A human readable name
            'name' => 'Do something with this module',
            // Something to remember what it is for
            'description' => 'What can be achieved with this permission',
            // Internal machine name, no spaces, no funny symbols, same rules as a variable
            // Use yourmodule_ prefix
            'code' => 'mymodule_access_one',
            // Default value in case it is not set
            'def' => false, // Or true, you decide
        ],
    ];
}

/**@}*/
/** @}*/
