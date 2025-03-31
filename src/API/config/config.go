package config

import (
    "gorm.io/driver/mysql"
    "gorm.io/gorm"
)

var DB *gorm.DB

func ConnectDB() error {
    dsn := "root:@tcp(127.0.0.1:3310)/computer-based-test?charset=utf8mb4&parseTime=True&loc=Local"
    db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
    if err != nil {
        return err // Mengembalikan error jika gagal terhubung
    }
    DB = db
    return nil // Mengembalikan nil jika berhasil terhubung
}