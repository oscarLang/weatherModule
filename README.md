# Weather module for the anax framework
`composer require osln/weather`

The module can be installed by running a postprocces script

`bash /vendor/osln/weather/.anax/scaffold/postprocces.d/350_weather.bash`
# Manual installation

1: Copy the configuration files

`rsync -av vendor/osln/weather/config ./`

2: Copy the view files

`rsync -av vendor/osln/weather/view/ view/osln/`

3: Install leaflet

`cd $PWD/vendor/osln/weather/ | npm install`

4: copy leaflet css files

`rsync -av vendor/osln/weather/node_modules/leaflet/dist/leaflet.css htdocs/css/`

`rsync -av vendor/osln/weather/node_modules/leaflet/dist/images/ htdocs/css/images/`
