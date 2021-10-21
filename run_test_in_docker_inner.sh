#/bin/bash

#
# This is the script used inside the docker to run the tests
#

composer install
./vendor/bin/phpunit tests