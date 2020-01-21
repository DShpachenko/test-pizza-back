#!/bin/sh

cd /workdir

git fetch origin master
git diff --diff-filter=M --name-only master | grep php > .check

## Проверяем на наличие тестовго кода, который не должен попасть в коммит
if cat .check | xargs -n1 -P 4 cat | grep '@TEST'; then
    echo 'Необходимо убрать тестовый код'
    exit 1
fi

# Пороверяем синтаксис пхп
cat .check | xargs -n1 -P 4 php -l

## Запуск проверки с исправлением
cat .check | xargs -n1 -P 4 php-cs-fixer fix --config=.php_cs --using-cache=false