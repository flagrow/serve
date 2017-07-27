# ![flagrow logo](https://avatars0.githubusercontent.com/u/16413865?v=3&s=20) [Flagrow](https://discuss.flarum.org/d/1832-flagrow-extension-developer-group) Serve, a project of [Gravure](https://gravure.io/).

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/flagrow/serve/blob/master/LICENSE.md)
[![Latest Stable Version](https://img.shields.io/packagist/v/flagrow/serve.svg)](https://packagist.org/packages/flagrow/serve)
[![Total Downloads](https://img.shields.io/packagist/dt/flagrow/serve.svg)](https://packagist.org/packages/flagrow/serve)
[![Support Us](https://img.shields.io/badge/patreon-support-yellow.svg)](https://www.patreon.com/flagrow)

Add the `serve` command to Flarum.
This will allow you to start Flarum into the PHP developement server via a simple command.

**This package is made for developers, it should probably not be installed on production servers.
Use at your own risks !**

## Install

    composer require flagrow/serve

Don't have Composer on your server ?
You can also install it with [Bazaar](https://github.com/flagrow/bazaar).

## Usage

Enable the extension via the admin dashboard.
You can then start the dev server from the Flarum root folder with:

    php vendor/bin/flagrow serve

The command has the same options as the Laravel `serve` command:

    php vendor/bin/flagrow serve --host=0.0.0.0 --port=4000

You can check the help via:

    php vendor/bin/flagrow help serve

This extension uses the [flagrow/console](https://github.com/flagrow/console) package to provide non-standard commands in Flarum.
"Flagrow Console" is shown in the extension tab as well, but you don't have to enable it in order to use the `serve` command.
See the [Flagrow Console README](https://github.com/flagrow/console) to see what else is available if you enable it.

## Standalone usage

If Flarum is not yet installed or you can't enable the extension, you can also use the router script directly:

    php -S 127.0.0.1:8000 vendor/flagrow/serve/src/server.php

## Support our work

We prefer to keep our work available to everyone.
In order to do so we rely on voluntary contributions on [Patreon](https://www.patreon.com/flagrow).
