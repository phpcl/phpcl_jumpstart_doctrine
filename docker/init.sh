#!/bin/bash
mysql jumpstart < /tmp/restore_perms.sql
mysql jumpstart < /tmp/jumpstart.sql
