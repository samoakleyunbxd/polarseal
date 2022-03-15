The purpose of this module is to display available updates for any premium (paid) modules and themes. The module works similar to the core Update Manager module.

There are few steps that you as a developer have to do in your modules and the website that will serve as an update server.

1. You would need to update .info YAML files for your premium module or theme:

update_premium:
  update_server: 'https://www.example.com/update/project.json'
  project_url: 'https://www.example.com/modules/my-project'
  authors:
    'Author Name': 'mailto:example@gmail.com'

2. You would need an endpoint that returns update status for your project. Here is the structure of the endpoint (https://www.example.com/update/project.json):

{
    "name" : "Module Name",
    "machine_name" : "module_name",
    "description" : "Your module description. I would recommend to match it with the description in .info file.",
    "project_url" : "https://www.example.com/modules/my-project",
    "download_url" : "https://www.example.com/modules/my-project.tar.gz",
    "release_details_url" : "https://www.example.com/modules/my-project/release-1.0-notes",
    "type" : "module",
    "version" : "8.x-1.0",
    "core": "8.7.x",
    "tested_up_to": "8.7.5",
    "timestamp": 1563496685,
    "security_update": false,
    "authors" : {
        "Author Name" : "mailto:example@gmail.com"
    },
    "license": {
      "email": "mmyunusov@gmail.com",
      "license_type": "single",
      "usage_count": 1
    }
}

3. Endpoint from step 2 (update_server parameter) should pass ?license=[Email address] for validation.

4. If license is not verified the following should be returned.

{
    "code": "INVALID_LICENSE",
    "message": "Invalid license, make sure you are passing correct license email address"
}

That's it, now when you access /admin/reports/updates/premium you should be able to see your project with its update status.
