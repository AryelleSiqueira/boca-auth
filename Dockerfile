#========================================================================
# Copyright Universidade Federal do Espirito Santo (Ufes)
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <https://www.gnu.org/licenses/>.
# 
# This program is released under license GNU GPL v3+ license.
#
#========================================================================

# Build on base image (default: ghcr.io/joaofazolo/boca-docker/boca-web:1.2)
# Use official Docker images whenever possible
ARG BASE_IMAGE=ghcr.io/joaofazolo/boca-docker/boca-web:1.2

# The efficient way to publish multi-arch containers from GitHub Actions
# https://actuated.dev/blog/multi-arch-docker-github-actions
# hadolint ignore=DL3006
FROM --platform=${BUILDPLATFORM:-linux/amd64} ${BASE_IMAGE}

ARG TARGETPLATFORM
ARG BUILDPLATFORM
ARG TARGETOS
ARG TARGETARCH

LABEL authors="Aryelle Gomes Siqueira, Rodrigo Laiola Guimaraes"
ENV CREATED_AT 2023-09-18
ENV UPDATED_AT 2023-09-18

# Apache settings
ENV APACHE_RUN_USER  www-data

# Ensure we have superuser privileges
# https://github.com/cassiopc/boca/tree/master/doc
# https://github.com/cassiopc/boca/tree/master/tools
# hadolint ignore=DL3002
USER root

# Install dependencies
# hadolint ignore=DL3008,DL3015
RUN apt-get -y update \
    && apt-get -y install \
        php-ldap \
        curl \
        unzip \
        php-curl \
    && curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer self-update \
    && composer require google/apiclient \
    && rm -rf /var/lib/apt/lists/*

# Run the container as a non-root user
USER $APACHE_RUN_USER
