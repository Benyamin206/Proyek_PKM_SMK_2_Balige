package controllers

import (
    "API/config"
    "API/models"
    "net/http"

    "github.com/gin-gonic/gin"
)

func GetSiswa(c *gin.Context) {
    var siswa []models.Siswa
    config.DB.Find(&siswa)
    c.JSON(http.StatusOK, gin.H{"data": siswa})
}

func GetSiswaByID(c *gin.Context) {
    var siswa models.Siswa
    if err := config.DB.Where("id = ?", c.Param("id")).First(&siswa).Error; err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": "Record not found!"})
        return
    }
    c.JSON(http.StatusOK, gin.H{"data": siswa})
}

func CreateSiswa(c *gin.Context) {
    var input models.Siswa
    if err := c.ShouldBindJSON(&input); err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
        return
    }
    config.DB.Create(&input)
    c.JSON(http.StatusOK, gin.H{"data": input})
}

func UpdateSiswa(c *gin.Context) {
    var siswa models.Siswa
    if err := config.DB.Where("id = ?", c.Param("id")).First(&siswa).Error; err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": "Record not found!"})
        return
    }
    var input models.Siswa
    if err := c.ShouldBindJSON(&input); err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
        return
    }
    config.DB.Model(&siswa).Updates(input)
    c.JSON(http.StatusOK, gin.H{"data": siswa})
}

func DeleteSiswa(c *gin.Context) {
    var siswa models.Siswa
    if err := config.DB.Where("id = ?", c.Param("id")).First(&siswa).Error; err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": "Record not found!"})
        return
    }
    config.DB.Delete(&siswa)
    c.JSON(http.StatusOK, gin.H{"data": true})
}