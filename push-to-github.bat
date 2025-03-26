@echo off
cd /d %~dp0

echo Добавление всех файлов...
git add .

set /p MSG="Введите сообщение коммита (Enter для 'Обновление'): "
if "%MSG%"=="" set MSG=Обновление

echo Коммитим: %MSG%
git commit -m "%MSG%"

echo Отправка в GitHub...
git push origin main

pause
