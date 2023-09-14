# boca-ldap

## Requirements

* Install [Docker Desktop](https://www.docker.com/get-started).
* Install [Git](https://github.com/git-guides/install-git).

## Quick Start

* Open a Terminal window and make sure the Docker engine is up and running:

```sh
# List docker images
docker images -a
# List containers
docker container ls -a
```

* Clone this repo and run the following commands:

```sh
git clone https://github.com/aryellesiqueira/boca-ldap.git
cd boca-ldap
docker compose up -d
```

Voilà! The application should be running now.

* Open a web browser and visit the URL [http://localhost:8000/boca](http://localhost:8000/boca). First, create and activate a BOCA contest (user: _system_ | password: _boca_). Then, login as admin (user: _admin_ | password: _boca_) to manage users, problems, languages etc.

* To stop the application (considering that the shell is in the same directory):

```sh
docker compose down
```

## License

Copyright Universidade Federal do Espirito Santo (Ufes)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.

This program is released under license GNU GPL v3+ license.

## Support

Please report any issues with _boca-docker_ at [https://github.com/aryellesiqueira/boca-ldap/issues](https://github.com/aryellesiqueira/boca-ldap/issues)
