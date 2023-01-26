<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate(); 
        User::truncate(); 
        Role::truncate(); 

        $ownerRole = Role::create(['name'=>'Owner','display_name'=>'Owner']);
        $adminRole = Role::create(['name'=>'Admin','display_name'=>'Administrator']);
        $clientRole = Role::create(['name'=>'Client','display_name'=>'Client']);
        
        //Creating Permissions
        $viewProjectsPermission = Permission::create(['name'=>'ViewProjects','display_name'=>'View Projects']);
        $createProjectsPermission = Permission::create(['name'=>'CreateProjects','display_name'=>'Create Projects']);
        $updateProjectsPermission = Permission::create(['name'=>'UpdateProjects','display_name'=>'Update Projects']);
        $deleteProjectsPermission = Permission::create(['name'=>'DeleteProjects','display_name'=>'Delete Projects']);
        
        $viewTasksPermission = Permission::create(['name'=>'ViewTasks','display_name'=>'View Tasks']);
        $createTasksPermission = Permission::create(['name'=>'CreateTasks','display_name'=>'Create Tasks']);
        $updateTasksPermission = Permission::create(['name'=>'UpdateTasks','display_name'=>'Update Tasks']);
        $deleteTasksPermission = Permission::create(['name'=>'DeleteTasks','display_name'=>'Delete Tasks']);

        $viewUsersPermission = Permission::create(['name'=>'ViewUsers','display_name'=>'View Users']);
        $createUsersPermission = Permission::create(['name'=>'CreateUsers','display_name'=>'Create Users']);
        $updateUsersPermission = Permission::create(['name'=>'UpdateUsers','display_name'=>'Update Users']);
        $deleteUsersPermission = Permission::create(['name'=>'DeleteUsers','display_name'=>'Delete Users']);
        
        $viewRolesPermission = Permission::create(['name'=>'ViewRoles','display_name'=>'View Roles']);
        $createRolesPermission = Permission::create(['name'=>'CreateRoles','display_name'=>'Create Roles']);
        $updateRolesPermission = Permission::create(['name'=>'UpdateRoles','display_name'=>'Update Roles']);
        $deleteRolesPermission = Permission::create(['name'=>'DeleteRoles','display_name'=>'Delete Roles']);

        $viewPermissionsPermission = Permission::create(['name'=>'ViewPermissions','display_name'=>'View Permissions']);
        $createPermissionsPermission = Permission::create(['name'=>'CreatePermissions','display_name'=>'Create Permissions']);
        $updatePermissionsPermission = Permission::create(['name'=>'UpdatePermissions','display_name'=>'Update Permissions']);
        $deletePermissionsPermission = Permission::create(['name'=>'DeletePermissions','display_name'=>'Delete Permissions']);
        
        //Giving Permission to Roles
        $ownerRole->givePermissionTo($viewProjectsPermission);
        $ownerRole->givePermissionTo($createProjectsPermission);
        $ownerRole->givePermissionTo($updateProjectsPermission);
        $ownerRole->givePermissionTo($deleteProjectsPermission);

        $ownerRole->givePermissionTo($viewTasksPermission);
        $ownerRole->givePermissionTo($createTasksPermission);
        $ownerRole->givePermissionTo($updateTasksPermission);
        $ownerRole->givePermissionTo($deleteTasksPermission);
        
        $ownerRole->givePermissionTo($viewUsersPermission);
        $ownerRole->givePermissionTo($createUsersPermission);
        $ownerRole->givePermissionTo($updateUsersPermission);
        $ownerRole->givePermissionTo($deleteUsersPermission);

        $ownerRole->givePermissionTo($viewRolesPermission);
        $ownerRole->givePermissionTo($createRolesPermission);
        $ownerRole->givePermissionTo($updateRolesPermission);
        $ownerRole->givePermissionTo($deleteRolesPermission);

        $ownerRole->givePermissionTo($viewPermissionsPermission);
        $ownerRole->givePermissionTo($createPermissionsPermission);
        $ownerRole->givePermissionTo($updatePermissionsPermission);
        $ownerRole->givePermissionTo($deletePermissionsPermission);

        $adminRole->givePermissionTo($viewProjectsPermission);
        $adminRole->givePermissionTo($createProjectsPermission);
        $adminRole->givePermissionTo($updateProjectsPermission);
        $adminRole->givePermissionTo($deleteProjectsPermission);
        
        $adminRole->givePermissionTo($viewTasksPermission);
        $adminRole->givePermissionTo($createTasksPermission);
        $adminRole->givePermissionTo($updateTasksPermission);
        $adminRole->givePermissionTo($deleteTasksPermission);
        
        $owner = new User;
        $owner->name = 'Bladimir';
        $owner->email = 'malavebj@gmail.com';
        $owner->password = '12345678';
        $owner->save();
        $owner->assignRole($ownerRole);

        $admin = new User;
        $admin->name = 'Jose';
        $admin->email = 'jose@gmail.com';
        $admin->password = '12345678';
        $admin->save();
        $admin->assignRole($adminRole);        
        
        $client = new User;
        $client->name = 'Juan';
        $client->email = 'juan@gmail.com';
        $client->password = '12345678';
        $client->save();
        $client->assignRole($clientRole);

        $client = new User;
        $client->name = 'Manuel';
        $client->email = 'manuel@gmail.com';
        $client->password = '12345678';
        $client->save();
        $client->assignRole($clientRole);

        $client = new User;
        $client->name = 'Pedro';
        $client->email = 'pedro@gmail.com';
        $client->password = '12345678';
        $client->save();
        $client->assignRole($clientRole);

        $client = new User;
        $client->name = 'Diego';
        $client->email = 'diego@gmail.com';
        $client->password = '12345678';
        $client->save();
        $client->assignRole($clientRole);
    }
}
