# Barcode Value Finder

Scans a code 39 barcode and searches given lists for the value.

## Requirements

The project is written using the php framework [laravel v5.7](https://laravel.com/docs/5.7/). Therefore the requirements are equal to the framework requirements:

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

## Installation

- Copy all the files to the webserver
- Use the public directory as the webroot
- Rename `.env.example` to `.env`
- Update the Database credentials in the `.env` file
- Use [Composer](https://getcomposer.org/) to install all dependencies `composer install`

## Development

Follow the installation steps and additionally run the following steps

- `yarn` or `npm install`
- `yarn watch` or `npm run watch`

