# Weather module for the anax framework
`composer require osln/weather`
The module can be installed by running a postprocces script
`bash /vendor/osln/weather/.anax/scaffold/postprocces.d/350_weather.bash`
# Manual installation

## Copy the configuration files
rsync -av vendor/osln/weather/config ./

## Copy the view files
rsync -av vendor/osln/weather/view/ view/osln/

## Install leaflet
cd $PWD/vendor/osln/weather/ | npm install

##copy leaflet css files
rsync -av vendor/osln/weather/node_modules/leaflet/dist/leaflet.css htdocs/css/
rsync -av vendor/osln/weather/node_modules/leaflet/dist/images/ htdocs/css/images/
