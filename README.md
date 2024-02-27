# boca-auth

## Table of Contents

- [What Is BOCA?](#what-is-boca)
- [Why boca-auth?](#why-boca-auth)
- [How Does It Work?](#how-does-it-work)
- [Requirements](#requirements)
- [Quick Start](#quick-start)
- [How To Add Custom Configuration](#how-to-add-custom-configuration)
  - [Google Authentication](#case-1-google-authentication)
  - [LDAP Authentication](#case-2-ldap-authentication)
- [Relevant Information](#relevant-information)
- [How To Contribute](#how-to-contribute)
- [License](#license)
- [Support](#support)

## What Is BOCA?

The BOCA Online Contest Administrator, commonly referred to as BOCA, is a robust administrative system designed for orchestrating programming contests, including renowned events like ACM-ICPC and Maratona de Programação da SBC. BOCA represents a powerful tool for streamlining the administration of programming contests, making it a valuable asset for contest organizers and participants.
For more in-depth information, please visit the official repository at [https://github.com/cassiopc/boca](https://github.com/cassiopc/boca).

In order to grant access to the system, it is imperative to ascertain whether the user attempting to connect possesses the necessary credentials. At present, BOCA's sole authentication method mandates that a user's provided password undergo encryption before transmission across the connection and storage in the database.
This encryption process employs cryptographic hashing, which is widely regarded as a secure means of safeguarding sensitive data. Its primary objective is to thwart any attempts at password interception on untrusted connections, although it is worth noting that SSL certificate authentication may represent a more robust alternative.

## Why boca-auth?

The _boca-auth_ project exemplifies the practical application of alternative authentication methods to elevate user convenience, foster inclusivity, and alleviate the burden of password fatigue, which often plagues users managing multiple accounts.
Through extensive reverse engineering efforts, we have devised a method that empowers administrators to configure BOCA's authentication settings conveniently via environment variables, thereby extending support for both [LDAP](https://en.wikipedia.org/wiki/Lightweight_Directory_Access_Protocol) and [Google](https://developers.google.com/workspace/guides/auth-overview) authentication methods.

This work started as part of the undergraduate final year project carried out by Aryelle Gomes Siqueira under supervision of Prof. Dr. Rodrigo Laiola Guimaraes at Universidade Federal do Espirito Santo ([UFES](https://www.ufes.br/)).

## How Does It Work?

#### BOCA Authentication (Default)
![Alt text](/imgs/default-auth.png "BOCA authentication (default)")

#### LDAP Authentication
![Alt text](/imgs/ldap-auth.png "BOCA authentication against LDAP")

#### Google Authentication
![Alt text](/imgs/google-auth.png "BOCA authentication against Google")

## Requirements

* Install [Docker Desktop](https://www.docker.com/get-started);
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
  git clone https://github.com/aryellesiqueira/boca-auth.git
  cd boca-auth
  docker compose up -d --build
  ```

* Voilà! The application should be running now. Open a web browser and visit the URL [http://localhost:8001/boca](http://localhost:8001/boca). First, create and activate a BOCA contest (user: _system_ | password: _boca_). Then, login as admin (user: _admin_ | password: _boca_) to manage users, problems, languages etc.

* To stop the application (considering that the shell is in the same directory):

  ```sh
  docker compose down
  ```

## How To Add Custom Configuration

The configuration of the authentication method hinges on a collection of environment variables.

### Case 1: Google Authentication
1. **Creating a Project in Google Console:**
    - Go to the [Google Console](https://console.cloud.google.com/) and create a new project.
    - In the project settings page, click on **APIs & Services**, and then **Credentials**.
    - Click on **Create credentials** and select **OAuth client ID**.
    - Choose **Web application** and fill in the **Name** and **Authorized JavaScript origins** fields with the address of the server where BOCA will be deployed.
    - Fill in the **Authorized redirect URIs** field with the address of the server where BOCA will be deployed, followed by the path `/boca/index.php`, for example: `http://localhost:8001/boca/index.php`.
    - Click **Create** and copy the **Client ID** and **Client Secret**.

2. **Defining Environment Variables:**

| Name                  | Values               | Description                                              |
|-----------------------|-----------------------|----------------------------------------------------------|
| **BOCA_AUTH_METHOD**  | google                | Variable that defines the global authentication method. |
| **BOCA_SYSTEM_USER**  | system - <email_until_at> | Optional. Defines the user with "system" type permissions. When you want to define a user capable of authenticating with Google, you should provide the user's email up to the '@' character, for example: john_doe@gmail.com -> `BOCA_SYSTEM_USER=john_doe`. If you wish to use the default system user created by the system, simply specify the value 'system' or leave the variable undefined. |
| **BOCA_ADMIN_USER**   | admin - <email_until_at>  | Optional. Defines the user with "admin" type permissions. When you want to define a user capable of authenticating with Google, you should provide the user's email up to the '@' character, for example: john_doe@gmail.com -> `BOCA_ADMIN_USER=john_doe`. If you wish to use the default admin user created by the system, simply specify the value 'admin' or leave the variable undefined. |
| **BOCA_LOCAL_USERS**  | user1,user2,...,userN        | Optional. Defines which users will authenticate using the default method (password). Useful for cases where you want to register a user who does not have an institution account and also for cases where the administrator wants to have a view of another type of user for testing purposes. |
| **BOCA_AUTH_ALLOWED_DOMAINS** | university.domain_1, university.domain_2,... | Optional. Defines the allowed special domains for authentication. When not defined, all domains are allowed. If you wish to allow multiple domains, you should separate them by commas, for example: `BOCA_AUTH_ALLOWED_DOMAINS=edu.ufes.br,ufes.br`. |
| **GOOGLE_CLIENT_ID**  | <client_id>           | Client ID generated by Google Console. |
| **GOOGLE_CLIENT_SECRET** | <client_secret>     | Client Secret generated by Google Console. |

### Case 2: LDAP Authentication
- **Defining Environment Variables:**

| Name                | Values                   | Description                                            |
|---------------------|---------------------------|--------------------------------------------------------|
| **BOCA_AUTH_METHOD** | ldap                    | Variable that defines the global authentication method as LDAP. |
| **BOCA_SYSTEM_USER** | system - <ldap_user>    | Optional. Defines the user with "system" type permissions. When you want to define a user capable of authenticating with the LDAP server, you should provide the user's UUID. If you wish to use the default system user created by the system, simply specify the value 'system' or leave the variable undefined. |
| **BOCA_ADMIN_USER**  | admin - <ldap_user>     | Optional. Defines the user with "admin" type permissions. When you want to define a user capable of authenticating with the LDAP server, you should provide the user's UUID. If you wish to use the default admin user created by the system, simply specify the value 'admin' or leave the variable undefined. |
| **BOCA_LOCAL_USERS** | user1,user2,...,userN            | Optional. Defines which users will authenticate using the default method (password). Useful for cases where you want to register a user who does not have an account in the institution's LDAP server and also for cases where the administrator wants to have a view of another type of user for testing purposes. |
| **LDAP_SERVER**      | ldap://ldap:389         | LDAP server URI. |
| **LDAP_BASE_DN**     | dc=inf,dc=ufes,dc=br   | LDAP server Base DN. |
| **LDAP_USER**        | cn=admin,dc=inf,dc=ufes,dc=br   | User with read permissions on the LDAP server. |
| **LDAP_PASSWORD**    | <user_password>         | Password of the user with read permissions on the LDAP server. |

## Relevant Information

- When ``BOCA_SYSTEM_USER`` and ``BOCA_ADMIN_USER`` are not defined or when they are defined with default values (system and admin, respectively), BOCA creates the default system and admin users, which authenticate using the "password" method. This means that these users will not use the global authentication method defined by the BOCA_AUTH_METHOD variable. To have these system and admin users use the global authentication method, you must define the values of the respective environment variables as pre-existing users in the authentication server, whether it's Google or LDAP.

- ``BOCA_SYSTEM_USER`` and ``BOCA_ADMIN_USER`` must be different because it is not possible to have a user of both system and admin types at the same time.

- When using LDAP authentication, the user's credentials are sent to the server in the body of the request in plain text. Therefore, it is recommended to use this method only when the connection between the server and the client is secure, for example, when using SSL certificates.

- ``BOCA_AUTH_ALLOWED_DOMAINS`` is reserved for special domains, such as the university domain, and should not be filled with "gmail.com." When not defined, all domains are allowed.

- There is a size restriction for the username in the database, limiting it to a maximum of 20 characters. In the case of authentication with Google, the existing limitation prevents the full email address from being defined as the username. Therefore, only the first part of the address, up to the '@' character, is registered. However, this approach can create a problem in cases where it is necessary to allow multiple email domains. For example, suppose BOCA allows the domains "edu.ufes.br" and "ufes.br." If a student has an email address like "student.one@ufes.br," they will be registered as 'student.one' in the system. However, there may be another account with the address "student.one@edu.ufes.br," and as a result, two distinct accounts can be used to authenticate the same user, creating two issues: (1) if the accounts belong to two students in the same class, it will not be possible to create accounts for both because usernames must be unique; (2) if the accounts belong to two different students, with only one of them belonging to that class, the system will allow an unauthorized user to authenticate and access information they shouldn't. To avoid this problem, it is not recommended to àllow multiple email domains.

## How To Contribute

If you would like to help contribute to this project, please see [CONTRIBUTING](https://github.com/rlaiola/boca-utils/blob/main/CONTRIBUTING.md).

Before submitting a PR consider building and testing a Docker image locally and checking your code with Super-Linter:

  ```sh
  docker run --rm \
             -e ACTIONS_RUNNER_DEBUG=true \
             -e RUN_LOCAL=true \
             --env-file ".github/super-linter.env" \
             -v "$PWD":/tmp/lint \
             ghcr.io/super-linter/super-linter:latest
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

Please report any issues with _boca-auth_ at [https://github.com/aryellesiqueira/boca-auth/issues](https://github.com/aryellesiqueira/boca-auth/issues)
