#!/bin/bash

#
# This script build the docker image and uses it to run the tests
#

TAG=slack-larvel-test-docker

docker build . --tag $TAG

docker run          \
    --rm            \
    -v $(pwd)/:/app \
    --user $(id -u)      \
    --workdir /app \
    --entrypoint 'bash' \
    $TAG \
    /app/run_test_in_docker_inner.sh
