package main

import (
    "API/config"
    "API/routes"
    "log"
)

func main() {
    // Connect to the database
    if err := config.ConnectDB(); err != nil {
        log.Fatal("Failed to connect to database:", err)
    }

    // Set up the router
    r := routes.SetupRouter()

    // Run the server
    log.Println("Server is running on port 8080")
    if err := r.Run(":8080"); err != nil {
        log.Fatal("Failed to start server:", err)
    }
}