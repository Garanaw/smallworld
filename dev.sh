#!/usr/bin/env bash

COMMAND=$1
shift

# Prepare the command runners:
COMPOSER="composer"
ARTISAN="php artisan"

case "$COMMAND" in
    install)
        ${COMPOSER} install
        cp .env.example .env
        ${ARTISAN} key:generate
        chmod -R 777 storage/
        ;;
    migrate)
        ${ARTISAN} migrate:install
        ${ARTISAN} migrate --step
        ;;
esac
