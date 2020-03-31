#!/bin/bash

if [ -z $(cat inscritos.txt | grep $1) ]; then
    echo $1 >> inscritos.txt;
    echo "Ok, você está inscrito agora!";
else
    echo "Você já está inscrito.";
fi
