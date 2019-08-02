# docker-local
### A local web dev environment, originally set up to spin up quick WordPress sites.

## Requirements

* docker
* docker-compose


## commands needed to run on first container load

`docker exec -it name_of_wp_container /bin/bash`
then:
`chown www-data:www-data -R wp-content/plugins`
`chown www-data:www-data -R wp-content/uploads`

and whatever else you need to give permissions to, (but usually not the theme which the container doesn't have to write to...)

This is to ensure the images will be loaded and used correctly locally.
Need to see about running this automatically.



---------------


## @TODO

* automate updated wp-content to user www-data
** docker exec -it <container name> /bin/bash
* automate names here with config file
* add url and port automatically
