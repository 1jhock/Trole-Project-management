#Project-based File management App

## What it does?
File project management (just like github for non-programmers). It tracks all the files of the created project and
displays who is working on a current file and the logs of the file read-write-download. Every project has a team leader and sets file
restrictions.

BLUEPRINT:
User {joins} team
Team {has} project
Project {has} files

DATABASE:
User:     user_id, name, email, username, password date_created
Projects: proj_id, name, create_by_id, date_created
Activity: act_id, proj_id, user_id, action
Files:    file_id, name, autority, date_created, owner_id


TIMELINE FEATURE:
User1 downloaded file1
User1 reads file2
User2 updated file1
User2 added new file: file3
User4 deleted file1

WIKI:
Project
A project is basically a group of files that needed to be finished before deadline.

Team Leader
A person who created the project. He can control action and file restrictions within the project.

Member
One of many members creating the project.

VIEWS:
Home