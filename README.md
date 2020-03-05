# docker-local
### A local web dev environment, originally set up to spin up quick WordPress sites.

## Requirements

* docker
* docker-compose

### Optional but recommended

* degit `npm install -g degit`

## Steps

1. Set up a directory you want you project to live in.
1. From within that dir clone the github project: `jessekeyes/docker-local`, or with `degit`, run: `degit jessekeyes/docker.local myprojectdir`
1. This will create a project with this structure:
```
- myprojectdir

- - data/
- - site/
- - .gitignore
- - docker-compose.yml
- - README.md

```
1. If the project already exists, copy SQL file, and uploads dir to the `.data`
1. cd into the `site` and git checkout your project there.


## commands needed to run on first container load

`docker exec -it name_of_wp_container /bin/bash`
then:
(current process)

`chown www-data:www-data -R wp-content/plugins`
`chown www-data:www-data wp-content/uploads` (if used)
`chown www-data:www-data wp-content`

Note non-recursives where needed

and whatever else you need to give permissions to, (but usually not the theme which the container doesn't have to write to...)

This is to ensure the images will be loaded and used correctly locally.
Need to see about running this automatically.



---------------


## @TODO

* automate updated wp-content to user www-data
** docker exec -it <container name> /bin/bash
* add wp_cli to container
