import os

# Define the folder structure
structure = {
    "Iceland-Travel": {
        "public": {
            "css": ["global.css", "index.css", "contact.css", "dashboard.css"],
            "js": ["main.js", "index.js", "dashboard.js"],
            "images": {
                "logo": [],
                "cities": []
            },
            "videos": []
        },
        "src": {
            "components": ["header.php", "footer.php", "sidenav.php"],
            "pages": ["index.php", "contact.php", "dashboard.php", "login.php", "signup.php", "aboutus.php", "sitesandmonuments.php", "ville.php", "gmap.php"],
            "db": ["dbconnection.php", "BD.sql"],
            "includes": ["config.php", "functions.php"]
        },
        "assets": {
            "cities": [],
            "img": [],
            "videos": []
        },
        "README.md": "",
        ".htaccess": ""
    }
}

# Function to create folders and files
def create_structure(base_path, structure):
    for name, content in structure.items():
        path = os.path.join(base_path, name)
        if isinstance(content, dict):
            # Create a folder
            os.makedirs(path, exist_ok=True)
            print(f"Created folder: {path}")
            create_structure(path, content)
        elif isinstance(content, list):
            # Create files in the folder
            os.makedirs(path, exist_ok=True)
            print(f"Created folder: {path}")
            for file in content:
                file_path = os.path.join(path, file)
                with open(file_path, "w") as f:
                    pass  # Create an empty file
                print(f"Created file: {file_path}")
        else:
            # Create an empty file
            with open(path, "w") as f:
                pass  # Create an empty file
            print(f"Created file: {path}")

# Base path where the structure will be created
base_path = os.path.join(os.getcwd(), "Iceland-Travel")

# Create the structure
create_structure(base_path, structure)

print("Folder structure and files created successfully!")