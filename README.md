# logserver

## Introduction

A log server accepting http requests on udp to log async to configured locations over network.

We use this in the [`appserver.io`](<http://www.appserver.io>) project as a server component for internal logging.

## Installation

If you want to use the log server with your application you can install it by adding

```sh
{
    "require": {
        "appserver-io/logserver": "dev-master"
    },
}
```

to your ```composer.json``` and invoke ```composer update``` in your project.

Usage
-----
If you can satisfy the requirements it is very simple to use the logserver. Just do this:
```bash
git clone https://github.com/appserver-io/logserver
PHP_BIN=/path/to/your/threadsafe/php-binary logserver/src/bin/logserver
```
If you're using [`appserver.io`](<http://www.appserver.io>) it'll be this:
```bash
git clone https://github.com/appserver-io/logserver
./logserver/src/bin/logserver
```

Now the server is listening on ```0.0.0.0.9514```.

You can send normal http request into the log server in a specific way which is not clear yet.

More documentation on how requests should look like and how to configure the locations is comming soon...


# External Links

* Documentation at [appserver.io](http://docs.appserver.io)
* Documentation on [GitHub](https://github.com/techdivision/TechDivision_AppserverDocumentation)
* [Getting started](https://github.com/techdivision/TechDivision_AppserverDocumentation/tree/master/docs/getting-started)
