#!/bin/bash
read -p "Commit description: " desc
git commit -a -m "$desc" && \
git pull && \
git push origin +Develop