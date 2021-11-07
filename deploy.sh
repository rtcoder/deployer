#!/bin/bash

############################################################
# Help                                                     #
############################################################
Help()
{
   # Display Help
   echo
   echo "Project deploy script."
   echo
   echo "Syntax: sh deploy.sh [-db_name|db_user|db_password|db_port|db_host|db_connection] <value>"
   echo "options:"
   echo "db_name           Set database name."
   echo "db_user           Set database user."
   echo "db_password       Set database password."
   echo "db_port           Set database port."
   echo "db_host           Set database host."
   echo "db_connection     Set database connection."
   echo "env               Set environment type."
   echo
}

############################################################
############################################################
# Main program                                             #
############################################################
############################################################

if [[  "$*" != *-h* ]]; then
    ############################################################
    # Backup .env                                              #
    ############################################################
    ENV_FILE=.env
    if [ -f "$ENV_FILE" ]; then
        echo "Backup environment file"
        cp .env .env.backup
        echo "Backup is ready in .env.backup"
    fi

    ############################################################
    # Copy .env.example to .env                                #
    ############################################################
    if [ ! -f "$FILE" ]; then
        echo "Copy .env.example to .env"
        cp .env.example .env
        echo "done"
    fi


    echo "----- composer update -----"
    composer update

    echo "----- composer install -----"
    composer install

    composer dump-autoload

    echo "----- chmod -R 777 storage vendor bootstrap/cache -----"
    chmod -R 777 storage vendor bootstrap/cache


    echo "----- link storage & generate key -----"
    php artisan storage:link
    php artisan key:generate

fi

############################################################
# Process the input options. Add options as needed.        #
############################################################
# Get the options
optspec=":hv-:"
while getopts "$optspec" optchar; do
    case "${optchar}" in
        -)
            case "${OPTARG}" in
                db_name=*) # Set database name
                    val=${OPTARG#*=}
                    echo "Set DB_DATABASE"
                    sed -i~ "s,^DB_DATABASE=.*$,DB_DATABASE=${val}," .env
                    grep '^DB_DATABASE' .env
                    ;;
                db_user=*) # Set database user
                    val=${OPTARG#*=}
                    echo "Set DB_USERNAME"
                    sed -i~ "s,^DB_USERNAME=.*$,DB_USERNAME=${val}," .env
                    grep '^DB_USERNAME' .env
                    ;;
                db_password=*) # Set database password
                    val=${OPTARG#*=}
                    echo "Set DB_PASSWORD"
                    sed -i~ "s,^DB_PASSWORD=.*$,DB_PASSWORD=${val}," .env
                    grep '^DB_PASSWORD' .env
                    ;;
                db_port=*) # Set database port
                    val=${OPTARG#*=}
                    echo "Set DB_PORT"
                    sed -i~ "s,^DB_PORT=.*$,DB_PORT=${val}," .env
                    grep '^DB_PORT' .env
                    ;;
                db_host=*) # Set database host
                    val=${OPTARG#*=}
                    echo "Set DB_HOST"
                    sed -i~ "s,^DB_HOST=.*$,DB_HOST=${val}," .env
                    grep '^DB_HOST' .env
                    ;;
                db_connection=*) # Set database connection
                    val=${OPTARG#*=}
                    echo "Set DB_CONNECTION"
                    sed -i~ "s,^DB_CONNECTION=.*$,DB_CONNECTION=${val}," .env
                    grep '^DB_CONNECTION' .env
                    ;;
                env=*) # Set environment type
                    val=${OPTARG#*=}
                    echo "Set APP_ENV"
                    sed -i~ "s,^APP_ENV=.*$,APP_ENV=${val}," .env
                    grep '^APP_ENV' .env
                    ;;
                *)
                    if [ "$OPTERR" = 1 ] && [ "${optspec:0:1}" != ":" ]; then
                        echo "Unknown option --${OPTARG}" >&2
                    fi
                    ;;
            esac;;
        h)
            Help
            exit 2
            ;;
        *)
            if [ "$OPTERR" != 1 ] || [ "${optspec:0:1}" = ":" ]; then
                echo "Non-option argument: '-${OPTARG}'" >&2
            fi
            ;;
    esac
done



echo "----- migrate -----"
php artisan migrate --force -vvv
chmod -R 777 storage/framework/cache/data
php artisan cache:clear
