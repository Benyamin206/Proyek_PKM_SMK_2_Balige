package controllers

import (
	"API/config"
	"API/models"
	"net/http"

	"github.com/gin-gonic/gin"
)

func GetGurus(c *gin.Context) {
	var gurus []models.Guru
	config.DB.Find(&gurus)
	c.JSON(http.StatusOK, gin.H{"data": gurus})
}

func GetGuru(c *gin.Context) {
	var guru models.Guru
	if err := config.DB.Where("id = ?", c.Param("id")).First(&guru).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Record not found!"})
		return
	}
	c.JSON(http.StatusOK, gin.H{"data": guru})
}

func CreateGuru(c *gin.Context) {
	var input models.Guru
	if err := c.ShouldBindJSON(&input); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}
	config.DB.Create(&input)
	c.JSON(http.StatusOK, gin.H{"data": input})
}

func ImportGurus(c *gin.Context) {
	var gurus []models.Guru
	if err := c.ShouldBindJSON(&gurus); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}

	for _, guru := range gurus {
		var existingGuru models.Guru
		if err := config.DB.Where("nip = ?", guru.NIP).First(&existingGuru).Error; err == nil {
			c.JSON(http.StatusBadRequest, gin.H{"error": "NIP " + guru.NIP + " sudah ada di tabel guru."})
			return
		}
		config.DB.Create(&guru)
	}

	c.JSON(http.StatusOK, gin.H{"data": gurus})
}

func UpdateGuru(c *gin.Context) {
	var guru models.Guru
	if err := config.DB.Where("id = ?", c.Param("id")).First(&guru).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Record not found!"})
		return
	}
	var input models.Guru
	if err := c.ShouldBindJSON(&input); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
		return
	}
	config.DB.Model(&guru).Updates(input)
	c.JSON(http.StatusOK, gin.H{"data": guru})
}

func DeleteGuru(c *gin.Context) {
	var guru models.Guru
	if err := config.DB.Where("id = ?", c.Param("id")).First(&guru).Error; err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Record not found!"})
		return
	}
	config.DB.Delete(&guru)
	c.JSON(http.StatusOK, gin.H{"data": true})
}
