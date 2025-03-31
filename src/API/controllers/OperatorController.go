package controllers

import (
    "API/config"
    "API/models"
    "net/http"

    "github.com/gin-gonic/gin"
)

func GetOperators(c *gin.Context) {
    var operators []models.Operator
    config.DB.Find(&operators)
    c.JSON(http.StatusOK, gin.H{"data": operators})
}

func GetOperator(c *gin.Context) {
    var operator models.Operator
    if err := config.DB.Where("id = ?", c.Param("id")).First(&operator).Error; err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": "Record not found!"})
        return
    }
    c.JSON(http.StatusOK, gin.H{"data": operator})
}

func CreateOperator(c *gin.Context) {
    var input models.Operator
    if err := c.ShouldBindJSON(&input); err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
        return
    }
    config.DB.Create(&input)
    c.JSON(http.StatusOK, gin.H{"data": input})
}

func UpdateOperator(c *gin.Context) {
    var operator models.Operator
    if err := config.DB.Where("id = ?", c.Param("id")).First(&operator).Error; err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": "Record not found!"})
        return
    }
    var input models.Operator
    if err := c.ShouldBindJSON(&input); err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
        return
    }
    config.DB.Model(&operator).Updates(input)
    c.JSON(http.StatusOK, gin.H{"data": operator})
}

func DeleteOperator(c *gin.Context) {
    var operator models.Operator
    if err := config.DB.Where("id = ?", c.Param("id")).First(&operator).Error; err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": "Record not found!"})
        return
    }
    config.DB.Delete(&operator)
    c.JSON(http.StatusOK, gin.H{"data": true})
}