# {{cookiecutter.project_name}}

This is a local wordpress development environment for {{cookiecutter.project_name}} based on [cookiecutter-wpdockersitedev](https://github.com/billdeitrick/cookiecutter-wpdockersitedev). 

## Getting Started

* Be sure your Docker engine is running. In the root project directory, run `docker-compose up` to bring up the environment.
* Import the database contents from version control to your database container. Run `.scripts\load_db.ps1` to do this.
* When you've made changes to the database that you want to push to version control, run `.\scripts\dump_db.ps1`.