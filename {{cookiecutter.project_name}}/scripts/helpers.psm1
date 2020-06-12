<#
.Synopsis
Finds the container ID of the database container.

.Description
Finds the ID of the container running the MySQL database based on the name of the container,
searches for the string "_name_db_1".

.Example
Find-DatabaseContainerID
#>
function Find-DatabaseContainerID {

    $id = ($(docker container ls | Select-String _db_1) -Split '\s+')[0]

    if ($id.length -eq 0) {
        throw "Database container not found. Is it running?"
    }

    return $id

}

Export-ModuleMember -Function Find-DatabaseContainerID

<#
.Synopsis
Gets the root database password (loads from secrets directory).

.Description
Load the database password from the secrets directory for use in scripts.

.Example
Get-DatabaseRootPassword
#>
function Get-DatabaseRootPassword {
    return Get-Content -Path "$PSScriptRoot\..\secrets\db_password.txt"
}

Export-ModuleMember -Function Get-DatabaseRootPassword
