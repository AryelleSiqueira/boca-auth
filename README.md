# :balloon: boca-auth

[![Close_stale_issues_and_PRs_workflow][close_stale_workflow_badge]][close_stale_workflow_link]

[![Google_Groups][groups_badge]][groups_link]

[close_stale_workflow_badge]: https://img.shields.io/github/actions/workflow/status/aryellesiqueira/boca-auth/close-stale.yml?label=close%20stale&logo=github
[close_stale_workflow_link]: https://github.com/aryellesiqueira/boca-auth/actions?workflow=close%20stale "close stale issues and prs"
[groups_badge]: https://img.shields.io/badge/join-boca--users%20group-blue.svg?logo=data:image/png;base64,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
[groups_link]: https://groups.google.com/g/boca-users "boca-users@Google Groups"

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

The BOCA Online Contest Administrator, commonly referred to as BOCA, is a robust administrative system designed for orchestrating programming contests following the [ACM-ICPC](https://icpc.global/) rules, particularly the [Maratona SBC de Programação](https://maratona.sbc.org.br/). BOCA represents a powerful tool for streamlining the administration of programming contests, making it a valuable asset for contest organizers and participants.
For more in-depth information, please visit the official repository at [https://github.com/cassiopc/boca](https://github.com/cassiopc/boca).

In order to grant access to the system, it is imperative to ascertain whether the user attempting to connect possesses the necessary credentials. At present, BOCA's sole authentication method mandates that a user's provided password undergo encryption before transmission across the connection and storage in the database.
This encryption process employs cryptographic hashing, which is widely regarded as a secure means of safeguarding sensitive data. Its primary objective is to thwart any attempts at password interception on untrusted connections, although it is worth noting that SSL certificate authentication may represent a more robust alternative.

## Why boca-auth?

The _boca-auth_ project exemplifies the practical application of alternative authentication methods to elevate user convenience, foster inclusivity, and alleviate the burden of password fatigue, which often plagues users managing multiple accounts.
Through extensive reverse engineering efforts, we have devised a method that empowers administrators to configure BOCA's authentication settings conveniently via environment variables, thereby extending support for both [LDAP](https://en.wikipedia.org/wiki/Lightweight_Directory_Access_Protocol) and [Google](https://developers.google.com/workspace/guides/auth-overview) authentication methods.

This work started as part of the undergraduate final year project carried out by Aryelle Gomes Siqueira under supervision of Prof. Dr. Rodrigo Laiola Guimaraes at Universidade Federal do Espirito Santo ([UFES](https://www.ufes.br/)).

## How Does It Work?

#### Default Authentication
![Alt text](/imgs/default-auth.png "BOCA default authentication")

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

The configuration of the authentication method hinges on a collection of environment variables in BOCA's web server.

### Case 1: LDAP Authentication
- **Defining Environment Variables:**

| Name                | Values                   | Description                                            |
|---------------------|---------------------------|--------------------------------------------------------|
| **BOCA_AUTH_METHOD** | ldap                    | Defines the authentication method as LDAP. |
| **BOCA_SYSTEM_USER** | <ldap_user_uid> | Optional. Defines a single user with _system_ type permissions that can create and activate programming contests. Provide the user name (UID) of an user capable of authenticating with the LDAP server. Valid characters are: a-z,A-Z,0-9, @.-\_. For instance, that would be **professorum** for a LDAP user defined as _uid=professorum,ou=professor,dc=inf,dc=ufes,dc=br_. If not set the application will consider the regular **system** user, which authenticates using the default password method. |
| **BOCA_ADMIN_USER**  | <ldap_user_uid> | Optional. Defines a single user with _admin_ type permissions that can manage programming contests. Provide the user name (UID) of an user capable of authenticating with the LDAP server. Valid characters are: a-z,A-Z,0-9, @.-\_. For instance, that would be **professordois** for a LDAP user defined as _uid=professordois,ou=professor,dc=inf,dc=ufes,dc=br_. If not set the application will consider the regular **admin** user, which authenticates using the default password method. |
| **BOCA_LOCAL_USERS** | user1,user2,...,userN | Optional. Defines a list of users that will authenticate using the default method (password). Length and characters restrictions apply (see [Relevant Information](#relevant-information)). Useful for cases in which you want to register a user who does not have an account in the institution's LDAP server or when you want to have a view of another type of user for testing purposes. Keep in mind that these users will not be created automatically (must be inserted manually by the administrator), unless the user name is the same used in the `BOCA_SYSTEM_USER` or `BOCA_ADMIN_USER` environment variables. |
| **LDAP_SERVER** | ldap://<ldap_url>:<ldap_port> | LDAP server URL and port. |
| **LDAP_BASE_DN** | dc=inf,dc=ufes,dc=br | LDAP server Base DN. |
| **LDAP_USER** | cn=admin,dc=inf,dc=ufes,dc=br | User with read permissions on the LDAP server. |
| **LDAP_PASSWORD** | <user_password> | Password of the user with read permissions on the LDAP server. |

### Case 2: Google Authentication
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
