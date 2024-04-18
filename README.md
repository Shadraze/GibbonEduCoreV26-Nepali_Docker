# WIP, not suited for production yet!!! only for testing!!!

# Be in this directory before running any of these commands.

# How-to for this project:
To install, use: ./Install.sh.

To run, use: ./Start.sh,  or 'docker compose up -d'. (Not using -d (terminal detach flag) will run in current terminal, closing this terminal will close project too, alternatively press Ctrl+C to stop the project safely)

NOTE: It can take a while for database to initialize files on first run, <br>
during which gibbon might say that it can't connect to the database. <br>
!!!If this docker project is abruptly stopped when database is being accessed, it can lead to corruption of database and need to recover/reinitialize files. <br>

To stop, use: ./Stop.sh, or 'docker compose down'

To restart, use: ./Restart.sh -> runs ./Stop.sh and then ./Start.sh

To reinstall, clear _Volumes folder (needs permission, !!! will clear database and gibbon folder, so backup if needed) and install.

# During Gibbon Installation, for step 2, use:
Database Address -> db <br>
Database Name -> gibbondb <br>
User -> gibbon <br>
Password -> gibbonPass <br>

# Refs:
Original docker project can be obtained through kerrongordon's github, using github tag "kerrongordon/gibbon-docker"
