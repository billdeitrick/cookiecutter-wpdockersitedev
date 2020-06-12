<#
.SYNOPSIS
  Load database from version control to container.

.DESCRIPTION
  This script uses `docker exec` to load the database from version control and
  add to the db container. Run whenever there are updates to the database in version
  control that you wish to load into your database container.
#>

Import-Module -Name "$PSScriptRoot\helpers.psm1"

$container_id = Find-DatabaseContainerID
$db_root_password = Get-DatabaseRootPassword

docker exec -w /var/db $container_id sh -c "mysql -u root -p$db_root_password wordpress < db.sql"