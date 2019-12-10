#!/usr/bin/env bash
#
# Install weather module in anax directory

## Copy the configuration files
rsync -av vendor/osln/weather/config ./

## Copy the view files
rsync -av vendor/osln/weather/view/ view/osln/

## Install leaflet
cd $PWD/vendor/osln/weather/ | npm install

##copy leaflet css files
rsync -av vendor/osln/weather/node_modules/leaflet/dist/leaflet.css htdocs/css/
rsync -av vendor/osln/weather/node_modules/leaflet/dist/images/ htdocs/css/images/
