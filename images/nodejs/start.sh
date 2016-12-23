#!/usr/bin/env bash
npm i --production

npm i -g pm2

pm2 start processes.json --no-daemon
