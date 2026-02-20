<?php

/*
 * Copyright (C) 2018-2024 CRLibre <https://crlibre.org>
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

global $config;

// ####################################################################################
//
// Database
//
// ####################################################################################
// Database name
$config['db']['name'] = 'crlibre';
// Database password
$config['db']['pwd'] = 'password';
// Database user name
$config['db']['user'] = 'sail';
// Database host
$config['db']['host'] = 'mysql';

// #############################################################################
//
// Crypto Keys
//
// #############################################################################
$config['crypto']['key'] = 'FNf9pHxyMFvalaeJeKdDLOdCeQVlDrAK4IXgmIW0zvE=';

// #############################################################################
//
// Core and Modules
//
// #############################################################################

// Paths USE TRAILING SLASHES!!!
// By default I will assume that core modules and contrib are located in the
// same directory as the Api, but they can be placed anywhere else

// The core installation: This is probably the only one you need to touch
$config['modules']['coreInstall'] = '/var/www/html/services/crlibre/api/';

// Name of your site, Not in use really
$config['core']['siteName'] = 'Facturador CRLibre';

// The host name for your site
$config['core']['host'] = 'localhost';

// Time in seconds for the lifetime of a session, after this time, the user must
// log back in
$config['users']['sessionLifetime'] = 86400;

// Core modules location
$config['modules']['corePath'] = $config['modules']['coreInstall'].'modules/';
// Contributed modules
$config['modules']['contribPath'] = $config['modules']['coreInstall'].'/contrib/';

// Where the internal resources are located, like 404 and default avatars and
// so forth. Use trailing slash!
// @todo This could be indicated by the template, if nothing found i would just
// return the indicated path back
$config['core']['resourcesPath'] = $config['modules']['coreInstall'].'/resources/';

// A private token in order to run cron, but I don't think this will be needed
// Not in use yet, you may ignore this
$config['cron']['cronToken'] = 'ItIsGoodIfThisIsBigAndHasW3irDLeeT3rsAnd$ymb0lz.IniT';

// List of core modules
$config['modules']['core'] = ['cala', 'db', 'users', 'files', 'geoloc', 'wirez', 'crypto'];
// List of core modules to load always, you can overide this list
$config['modules']['coreLoad'] = ['cala', 'db', 'users', 'crypto'];

// Am I running in CLI mode?
$config['core']['cli'] = false;

// ####################################################################################
//
// Grace: Only touch if you need to debug
//
// ####################################################################################
// Where do you want me to store the logs? USE TRAILING SLASH!
// If false I will not store them
$config['grace']['logPath'] = $config['modules']['coreInstall'].'logs/';

// ####################################################################################
//
// Files, Uploads and such
//
// ####################################################################################

// Location to upload files, USE TRAILING SLASH!!
// Each user will have its own directory within this path
$config['files']['basePath'] = $config['modules']['coreInstall'].'files/';
// Maximum upload size in Mb
$config['files']['maxUploadSize'] = 2;
// Default allowed extensions
$config['files']['allowedExt'] = 'jpg,JPG,jpeg,JPEG,png,PNG,gif,GIF,p12,P12,pfx,PFX';
