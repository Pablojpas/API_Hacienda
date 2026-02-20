<?php

/*
 * Copyright (C) 2017-2025 CRLibre <https://crlibre.org>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Boot up procedure
 */
function crlibreall_bootMeUp()
{
    // Just booting up
}

/**
 * Init function
 */
function crlibreall_init()
{
    $paths = [
        [
            'r' => 'FE',
            'action' => 'allFE',
            'access' => 'users_openAccess',
            'access_params' => 'accessName',
            'params' => [
                // Para modulo clave -> r=clave
                ['key' => 'tipoDocumento',         'def' => '',            'req' => true],
                ['key' => 'tipoCedula',            'def' => '',            'req' => true],
                ['key' => 'cedula',                'def' => '',            'req' => true],
                ['key' => 'codigoPais',            'def' => '',            'req' => true],
                ['key' => 'consecutivo',           'def' => '',            'req' => true],
                ['key' => 'situacion',             'def' => '',            'req' => true],
                ['key' => 'terminal',              'def' => '',            'req' => false],
                ['key' => 'sucursal',              'def' => '',            'req' => false],
                ['key' => 'codigoSeguridad',       'def' => '',            'req' => true],
                // Para modulo genXML -> r=gen_xml_fe
                ['key' => 'clave',                       'def' => '',     'req' => true],
                ['key' => 'proveedor_sistemas',          'def' => '',     'req' => true],
                ['key' => 'codigo_actividad_emisor',     'def' => '',     'req' => true],    // https://cloud-cube.s3.amazonaws.com/sp5z9nxkd1ra/public/assets/json/actividades_por_codigo.json
                ['key' => 'codigo_actividad_receptor',   'def' => '',     'req' => false],
                ['key' => 'consecutivo',                 'def' => '',     'req' => true],
                ['key' => 'fecha_emision',               'def' => '',     'req' => true],
                ['key' => 'emisor_nombre',               'def' => '',     'req' => true],
                ['key' => 'emisor_tipo_identif',         'def' => '',     'req' => true],
                ['key' => 'emisor_num_identif',          'def' => '',     'req' => true],
                ['key' => 'emisor_nombre_comercial',     'def' => '',     'req' => false],
                ['key' => 'emisor_provincia',            'def' => '',     'req' => true],
                ['key' => 'emisor_canton',               'def' => '',     'req' => true],
                ['key' => 'emisor_distrito',             'def' => '',     'req' => true],
                ['key' => 'emisor_barrio',               'def' => '',     'req' => false],
                ['key' => 'emisor_otras_senas',          'def' => '',     'req' => true],
                ['key' => 'emisor_cod_pais_tel',         'def' => '',     'req' => false],
                ['key' => 'emisor_tel',                  'def' => '',     'req' => false],
                ['key' => 'emisor_email',                'def' => '',     'req' => true],
                ['key' => 'receptor_nombre',             'def' => '',     'req' => true],
                ['key' => 'receptor_tipo_identif',       'def' => '',     'req' => true],
                ['key' => 'receptor_num_identif',        'def' => '',     'req' => true],
                ['key' => 'receptor_identif_extranjero', 'def' => '',     'req' => false],
                ['key' => 'receptor_nombre_comercial',   'def' => '',     'req' => false],
                ['key' => 'receptor_provincia',          'def' => '',     'req' => false],
                ['key' => 'receptor_canton',             'def' => '',     'req' => false],
                ['key' => 'receptor_distrito',           'def' => '',     'req' => false],
                ['key' => 'receptor_barrio',             'def' => '',     'req' => false],
                ['key' => 'receptor_otras_senas',        'def' => '',     'req' => false],
                ['key' => 'receptor_otras_senas_extranjero', 'def' => '', 'req' => false],
                ['key' => 'receptor_cod_pais_tel',       'def' => '',     'req' => false],
                ['key' => 'receptor_tel',                'def' => '',     'req' => false],
                ['key' => 'receptor_email',              'def' => '',     'req' => false],
                ['key' => 'registrofiscal8707',          'def' => '',     'req' => false],
                ['key' => 'condicion_venta',             'def' => '',     'req' => true],
                ['key' => 'condicion_venta_otros',       'def' => '',     'req' => false],
                ['key' => 'plazo_credito',               'def' => '0',    'req' => false],
                ['key' => 'medios_pago',                 'def' => '',     'req' => true],
                ['key' => 'cod_moneda',                  'def' => '',     'req' => true],
                ['key' => 'tipo_cambio',                 'def' => '',     'req' => true],
                ['key' => 'total_serv_gravados',         'def' => '',     'req' => false],
                ['key' => 'total_serv_exentos',          'def' => '',     'req' => false],
                ['key' => 'total_serv_exonerados',       'def' => '',     'req' => false],
                ['key' => 'total_serv_no_sujeto',        'def' => '',     'req' => false],
                ['key' => 'total_merc_gravada',          'def' => '',     'req' => false],
                ['key' => 'total_merc_exenta',           'def' => '',     'req' => false],
                ['key' => 'total_merc_exonerada',        'def' => '',     'req' => false],
                ['key' => 'total_merc_no_sujeta',        'def' => '',     'req' => false],
                ['key' => 'total_gravados',              'def' => '',     'req' => false],
                ['key' => 'total_exento',                'def' => '',     'req' => false],
                ['key' => 'total_exonerado',             'def' => '',     'req' => false],
                ['key' => 'total_no_sujeto',             'def' => '',     'req' => false],
                ['key' => 'total_ventas',                'def' => '',     'req' => true],
                ['key' => 'total_descuentos',            'def' => '',     'req' => false],
                ['key' => 'total_ventas_neta',           'def' => '',     'req' => true],
                ['key' => 'totalDesgloseImpuesto',       'def' => '',     'req' => false],
                ['key' => 'total_impuestos',             'def' => '',     'req' => false],
                ['key' => 'total_impuestos_asumidos_fabrica', 'def' => '', 'req' => false],
                ['key' => 'totalIVADevuelto',            'def' => '0',    'req' => false],
                ['key' => 'totalOtrosCargos',            'def' => '',     'req' => false],
                ['key' => 'total_comprobante',           'def' => '',     'req' => true],
                ['key' => 'otros',                       'def' => '',     'req' => false],
                ['key' => 'detalles',                    'def' => '',     'req' => true],
                ['key' => 'informacion_referencia',      'def' => '',     'req' => true],
                ['key' => 'otrosCargos',                 'def' => '',     'req' => false],
            ],
            'file' => 'genXML.php',
        ],
        [
            'r' => 'gen_xml_nc',
            'action' => 'genXMLNC',
            'access' => 'users_openAccess',
            'access_params' => 'accessName',
            'params' => [
                ['key' => 'clave',                     'def' => '',            'req' => true],
                ['key' => 'consecutivo',               'def' => '',            'req' => true],
                ['key' => 'fecha_emision',             'def' => '',            'req' => true],
                ['key' => 'emisor_nombre',             'def' => '',            'req' => true],
                ['key' => 'emisor_tipo_indetif',       'def' => '',            'req' => true],
                ['key' => 'emisor_num_identif',        'def' => '',            'req' => true],
                ['key' => 'nombre_comercial',          'def' => '',            'req' => true],
                ['key' => 'emisor_provincia',          'def' => '',            'req' => false],
                ['key' => 'emisor_canton',             'def' => '',            'req' => false],
                ['key' => 'emisor_distrito',           'def' => '',            'req' => false],
                ['key' => 'emisor_barrio',             'def' => '',            'req' => false],
                ['key' => 'emisor_otras_senas',        'def' => '',            'req' => false],
                ['key' => 'emisor_cod_pais_tel',       'def' => '',            'req' => false],
                ['key' => 'emisor_tel',                'def' => '',            'req' => false],
                ['key' => 'emisor_cod_pais_fax',       'def' => '',            'req' => false],
                ['key' => 'emisor_fax',                'def' => '',            'req' => false],
                ['key' => 'emisor_email',              'def' => '',            'req' => true],
                ['key' => 'omitir_receptor',           'def' => 'false',       'req' => false],
                ['key' => 'receptor_nombre',           'def' => '',            'req' => false],
                ['key' => 'receptor_tipo_identif',     'def' => '',            'req' => false],
                ['key' => 'receptor_num_identif',      'def' => '',            'req' => false],
                ['key' => 'receptor_provincia',        'def' => '',            'req' => false],
                ['key' => 'receptor_canton',           'def' => '',            'req' => false],
                ['key' => 'receptor_distrito',         'def' => '',            'req' => false],
                ['key' => 'receptor_barrio',           'def' => '',            'req' => false],
                ['key' => 'receptor_cod_pais_tel',     'def' => '',            'req' => false],
                ['key' => 'receptor_tel',              'def' => '',            'req' => false],
                ['key' => 'receptor_cod_pais_fax',     'def' => '',            'req' => false],
                ['key' => 'receptor_fax',              'def' => '',            'req' => false],
                ['key' => 'receptor_email',            'def' => '',            'req' => false],
                ['key' => 'condicion_venta',           'def' => '',            'req' => true],
                ['key' => 'plazo_credito',             'def' => '0',           'req' => false],
                ['key' => 'medio_pago',                'def' => '',            'req' => true],
                ['key' => 'cod_moneda',                'def' => '',            'req' => true],
                ['key' => 'tipo_cambio',               'def' => '',            'req' => true],
                ['key' => 'total_serv_gravados',       'def' => '',            'req' => true],
                ['key' => 'total_serv_exentos',        'def' => '',            'req' => true],
                ['key' => 'total_merc_gravada',        'def' => '',            'req' => true],
                ['key' => 'total_merc_exenta',         'def' => '',            'req' => true],
                ['key' => 'total_gravados',            'def' => '',            'req' => true],
                ['key' => 'total_exentos',             'def' => '',            'req' => true],
                ['key' => 'total_ventas',              'def' => '',            'req' => true],
                ['key' => 'total_descuentos',          'def' => '',            'req' => true],
                ['key' => 'total_ventas_neta',         'def' => '',            'req' => true],
                ['key' => 'total_impuestos',           'def' => '',            'req' => true],
                ['key' => 'total_comprobante',         'def' => '',            'req' => true],
                ['key' => 'otros',                     'def' => '',            'req' => true],
                ['key' => 'detalles',                  'def' => '',            'req' => true],
                ['key' => 'infoRefeTipoDoc',           'def' => '',            'req' => true],
                ['key' => 'infoRefeNumero',            'def' => '',            'req' => true],
                ['key' => 'infoRefeFechaEmision',      'def' => '',            'req' => true],
                ['key' => 'infoRefeCodigo',            'def' => '',            'req' => true],
                ['key' => 'infoRefeRazon',             'def' => '',            'req' => true],
                // Para modulo signXML -> r=signFE
                ['key' => 'p12Url',                    'def' => '',            'req' => true],
                ['key' => 'pinP12',                    'def' => '',            'req' => true],
                ['key' => 'inXml',                     'def' => '',            'req' => false],
                ['key' => 'tipodoc',                   'def' => '',            'req' => true],
                // Para modulo token -> r=gettoken
                ['key' => 'grant_type',                'def' => '',            'req' => true],
                ['key' => 'client_id',                 'def' => '',            'req' => true],
                ['key' => 'client_secret',             'def' => '',            'req' => false],
                ['key' => 'username',                  'def' => '',            'req' => true],
                ['key' => 'password',                  'def' => '',            'req' => true],
                // Para modulo send -> r=json
                ['key' => 'token',                     'def' => '',            'req' => true],
                ['key' => 'clave',                     'def' => '',            'req' => true],
                ['key' => 'fecha',                     'def' => '',            'req' => true],
                ['key' => 'emi_tipoIdentificacion',    'def' => '',            'req' => true],
                ['key' => 'emi_numeroIdentificacion',  'def' => '',            'req' => false],
                ['key' => 'recp_tipoIdentificacion',   'def' => '',            'req' => true],
                ['key' => 'recp_numeroIdentificacion', 'def' => '',            'req' => true],
                ['key' => 'comprobanteXml',            'def' => '',            'req' => true],
                ['key' => 'client_id',                 'def' => '',            'req' => true],
            ],
            'file' => 'crlibreall.php',
        ],
        [
            'r' => 'NC',
            'action' => 'allNC',
            'access' => 'users_openAccess',
            'access_params' => 'accessName',
            'params' => [
                // Para modulo clave -> r=clave
                ['key' => 'tipoDocumento',             'def' => '',            'req' => true],
                ['key' => 'tipoCedula',                'def' => '',            'req' => true],
                ['key' => 'cedula',                    'def' => '',            'req' => true],
                ['key' => 'codigoPais',                'def' => '',            'req' => true],
                ['key' => 'consecutivo',               'def' => '',            'req' => true],
                ['key' => 'situacion',                 'def' => '',            'req' => true],
                ['key' => 'terminal',                  'def' => '',            'req' => false],
                ['key' => 'sucursal',                  'def' => '',            'req' => false],
                ['key' => 'codigoSeguridad',           'def' => '',            'req' => true],
                // Para modulo genXML -> r=gen_xml_nc
                ['key' => 'clave',                     'def' => '',            'req' => true],
                ['key' => 'consecutivo',               'def' => '',            'req' => true],
                ['key' => 'fecha_emision',             'def' => '',            'req' => true],
                ['key' => 'emisor_nombre',             'def' => '',            'req' => true],
                ['key' => 'emisor_tipo_indetif',       'def' => '',            'req' => true],
                ['key' => 'emisor_num_identif',        'def' => '',            'req' => true],
                ['key' => 'nombre_comercial',          'def' => '',            'req' => true],
                ['key' => 'emisor_provincia',          'def' => '',            'req' => false],
                ['key' => 'emisor_canton',             'def' => '',            'req' => false],
                ['key' => 'emisor_distrito',           'def' => '',            'req' => false],
                ['key' => 'emisor_barrio',             'def' => '',            'req' => false],
                ['key' => 'emisor_otras_senas',        'def' => '',            'req' => false],
                ['key' => 'emisor_cod_pais_tel',       'def' => '',            'req' => false],
                ['key' => 'emisor_tel',                'def' => '',            'req' => false],
                ['key' => 'emisor_cod_pais_fax',       'def' => '',            'req' => false],
                ['key' => 'emisor_fax',                'def' => '',            'req' => false],
                ['key' => 'emisor_email',              'def' => '',            'req' => true],
                ['key' => 'receptor_nombre',           'def' => '',            'req' => true],
                ['key' => 'receptor_tipo_identif',     'def' => '',            'req' => true],
                ['key' => 'receptor_num_identif',      'def' => '',            'req' => true],
                ['key' => 'receptor_provincia',        'def' => '',            'req' => false],
                ['key' => 'receptor_canton',           'def' => '',            'req' => false],
                ['key' => 'receptor_distrito',         'def' => '',            'req' => false],
                ['key' => 'receptor_barrio',           'def' => '',            'req' => false],
                ['key' => 'receptor_cod_pais_tel',     'def' => '',            'req' => false],
                ['key' => 'receptor_tel',              'def' => '',            'req' => false],
                ['key' => 'receptor_cod_pais_fax',     'def' => '',            'req' => false],
                ['key' => 'receptor_fax',              'def' => '',            'req' => false],
                ['key' => 'receptor_email',            'def' => '',            'req' => true],
                ['key' => 'condicion_venta',           'def' => '',            'req' => true],
                ['key' => 'plazo_credito',             'def' => '0',           'req' => false],
                ['key' => 'medio_pago',                'def' => '',            'req' => true],
                ['key' => 'cod_moneda',                'def' => '',            'req' => true],
                ['key' => 'tipo_cambio',               'def' => '',            'req' => true],
                ['key' => 'total_serv_gravados',       'def' => '',            'req' => true],
                ['key' => 'total_serv_exentos',        'def' => '',            'req' => true],
                ['key' => 'total_merc_gravada',        'def' => '',            'req' => true],
                ['key' => 'total_merc_exenta',         'def' => '',            'req' => true],
                ['key' => 'total_gravados',            'def' => '',            'req' => true],
                ['key' => 'total_exentos',             'def' => '',            'req' => true],
                ['key' => 'total_ventas',              'def' => '',            'req' => true],
                ['key' => 'total_descuentos',          'def' => '',            'req' => true],
                ['key' => 'total_ventas_neta',         'def' => '',            'req' => true],
                ['key' => 'total_impuestos',           'def' => '',            'req' => true],
                ['key' => 'total_comprobante',         'def' => '',            'req' => true],
                ['key' => 'otros',                     'def' => '',            'req' => true],
                ['key' => 'detalles',                  'def' => '',            'req' => true],
                ['key' => 'infoRefeTipoDoc',           'def' => '',            'req' => true],
                ['key' => 'infoRefeNumero',            'def' => '',            'req' => true],
                ['key' => 'infoRefeFechaEmision',      'def' => '',            'req' => true],
                ['key' => 'infoRefeCodigo',            'def' => '',            'req' => true],
                ['key' => 'infoRefeRazon',             'def' => '',            'req' => true],
                // Para modulo signXML -> r=signFE
                ['key' => 'p12Url',                    'def' => '',            'req' => true],
                ['key' => 'pinP12',                    'def' => '',            'req' => true],
                ['key' => 'inXml',                     'def' => '',            'req' => false],
                ['key' => 'tipodoc',                   'def' => '',            'req' => true],
                // Para modulo token -> r=gettoken
                ['key' => 'grant_type',                'def' => '',            'req' => true],
                ['key' => 'client_id',                 'def' => '',            'req' => true],
                ['key' => 'client_secret',             'def' => '',            'req' => false],
                ['key' => 'username',                  'def' => '',            'req' => true],
                ['key' => 'password',                  'def' => '',            'req' => true],
                // Para modulo send -> r=json
                ['key' => 'token',                     'def' => '',            'req' => true],
                ['key' => 'clave',                     'def' => '',            'req' => true],
                ['key' => 'fecha',                     'def' => '',            'req' => true],
                ['key' => 'emi_tipoIdentificacion',    'def' => '',            'req' => true],
                ['key' => 'emi_numeroIdentificacion',  'def' => '',            'req' => false],
                ['key' => 'recp_tipoIdentificacion',   'def' => '',            'req' => true],
                ['key' => 'recp_numeroIdentificacion', 'def' => '',            'req' => true],
                ['key' => 'comprobanteXml',            'def' => '',            'req' => true],
                ['key' => 'client_id',                 'def' => '',            'req' => true],
            ],
            'file' => 'crlibreall.php',
        ],
        [
            'r' => 'ND',
            'action' => 'allND',
            'access' => 'users_openAccess',
            'access_params' => 'accessName',
            'params' => [
                // Para modulo clave -> r=clave
                ['key' => 'tipoDocumento',             'def' => '',            'req' => true],
                ['key' => 'tipoCedula',                'def' => '',            'req' => true],
                ['key' => 'cedula',                    'def' => '',            'req' => true],
                ['key' => 'codigoPais',                'def' => '',            'req' => true],
                ['key' => 'consecutivo',               'def' => '',            'req' => true],
                ['key' => 'situacion',                 'def' => '',            'req' => true],
                ['key' => 'terminal',                  'def' => '',            'req' => false],
                ['key' => 'sucursal',                  'def' => '',            'req' => false],
                ['key' => 'codigoSeguridad',           'def' => '',            'req' => true],
                // Para modulo genXML -> r=gen_xml_nd
                ['key' => 'clave',                     'def' => '',            'req' => true],
                ['key' => 'consecutivo',               'def' => '',            'req' => true],
                ['key' => 'fecha_emision',             'def' => '',            'req' => true],
                ['key' => 'emisor_nombre',             'def' => '',            'req' => true],
                ['key' => 'emisor_tipo_indetif',       'def' => '',            'req' => true],
                ['key' => 'emisor_num_identif',        'def' => '',            'req' => true],
                ['key' => 'nombre_comercial',          'def' => '',            'req' => true],
                ['key' => 'emisor_provincia',          'def' => '',            'req' => false],
                ['key' => 'emisor_canton',             'def' => '',            'req' => false],
                ['key' => 'emisor_distrito',           'def' => '',            'req' => false],
                ['key' => 'emisor_barrio',             'def' => '',            'req' => false],
                ['key' => 'emisor_otras_senas',        'def' => '',            'req' => false],
                ['key' => 'emisor_cod_pais_tel',       'def' => '',            'req' => false],
                ['key' => 'emisor_tel',                'def' => '',            'req' => false],
                ['key' => 'emisor_cod_pais_fax',       'def' => '',            'req' => false],
                ['key' => 'emisor_fax',                'def' => '',            'req' => false],
                ['key' => 'emisor_email',              'def' => '',            'req' => true],
                ['key' => 'receptor_nombre',           'def' => '',            'req' => true],
                ['key' => 'receptor_tipo_identif',     'def' => '',            'req' => true],
                ['key' => 'receptor_num_identif',      'def' => '',            'req' => true],
                ['key' => 'receptor_provincia',        'def' => '',            'req' => false],
                ['key' => 'receptor_canton',           'def' => '',            'req' => false],
                ['key' => 'receptor_distrito',         'def' => '',            'req' => false],
                ['key' => 'receptor_barrio',           'def' => '',            'req' => false],
                ['key' => 'receptor_cod_pais_tel',     'def' => '',            'req' => false],
                ['key' => 'receptor_tel',              'def' => '',            'req' => false],
                ['key' => 'receptor_cod_pais_fax',     'def' => '',            'req' => false],
                ['key' => 'receptor_fax',              'def' => '',            'req' => false],
                ['key' => 'receptor_email',            'def' => '',            'req' => true],
                ['key' => 'condicion_venta',           'def' => '',            'req' => true],
                ['key' => 'plazo_credito',             'def' => '0',           'req' => false],
                ['key' => 'medio_pago',                'def' => '',            'req' => true],
                ['key' => 'cod_moneda',                'def' => '',            'req' => true],
                ['key' => 'tipo_cambio',               'def' => '',            'req' => true],
                ['key' => 'total_serv_gravados',       'def' => '',            'req' => true],
                ['key' => 'total_serv_exentos',        'def' => '',            'req' => true],
                ['key' => 'total_merc_gravada',        'def' => '',            'req' => true],
                ['key' => 'total_merc_exenta',         'def' => '',            'req' => true],
                ['key' => 'total_gravados',            'def' => '',            'req' => true],
                ['key' => 'total_exentos',             'def' => '',            'req' => true],
                ['key' => 'total_ventas',              'def' => '',            'req' => true],
                ['key' => 'total_descuentos',          'def' => '',            'req' => true],
                ['key' => 'total_ventas_neta',         'def' => '',            'req' => true],
                ['key' => 'total_impuestos',           'def' => '',            'req' => true],
                ['key' => 'total_comprobante',         'def' => '',            'req' => true],
                ['key' => 'otros',                     'def' => '',            'req' => true],
                ['key' => 'detalles',                  'def' => '',            'req' => true],
                ['key' => 'infoRefeTipoDoc',           'def' => '',            'req' => true],
                ['key' => 'infoRefeNumero',            'def' => '',            'req' => true],
                ['key' => 'infoRefeFechaEmision',      'def' => '',            'req' => true],
                ['key' => 'infoRefeCodigo',            'def' => '',            'req' => true],
                ['key' => 'infoRefeRazon',             'def' => '',            'req' => true],
                // Para modulo signXML -> r=signFE
                ['key' => 'p12Url',                    'def' => '',            'req' => true],
                ['key' => 'pinP12',                    'def' => '',            'req' => true],
                ['key' => 'inXml',                     'def' => '',            'req' => false],
                ['key' => 'tipodoc',                   'def' => '',            'req' => true],
                // Para modulo token -> r=gettoken
                ['key' => 'grant_type',                'def' => '',            'req' => true],
                ['key' => 'client_id',                 'def' => '',            'req' => true],
                ['key' => 'client_secret',             'def' => '',            'req' => false],
                ['key' => 'username',                  'def' => '',            'req' => true],
                ['key' => 'password',                  'def' => '',            'req' => true],
                // Para modulo send -> r=json
                ['key' => 'token',                     'def' => '',            'req' => true],
                ['key' => 'clave',                     'def' => '',            'req' => true],
                ['key' => 'fecha',                     'def' => '',            'req' => true],
                ['key' => 'emi_tipoIdentificacion',    'def' => '',            'req' => true],
                ['key' => 'emi_numeroIdentificacion',  'def' => '',            'req' => false],
                ['key' => 'recp_tipoIdentificacion',   'def' => '',            'req' => true],
                ['key' => 'recp_numeroIdentificacion', 'def' => '',            'req' => true],
                ['key' => 'comprobanteXml',            'def' => '',            'req' => true],
                ['key' => 'client_id',                 'def' => '',            'req' => true],
            ],
            'file' => 'crlibreall.php',
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
function MODULENAME_access()
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
