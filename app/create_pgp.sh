#!/bin/bash

#create a key with an email taken from command line

# CANCELLED - TODO: sed command to change joe@foo.bar to <email_from_command_line> $1 and also <password> $2
rngd -r /dev/urandom
gpg --batch --gen-key gpg_custom_seed
