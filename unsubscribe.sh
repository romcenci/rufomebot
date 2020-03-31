#!/bin/bash

if [ -z $(cat inscritos.txt | grep $1) ]; then
    echo "Você já não é inscrito.";
else
    sed -i'.bak' '/'$1'/d' inscritos.txt;
    echo "Pronto, você foi desinscrito.";
fi
