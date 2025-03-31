package models

import "time"

type QuizSoal struct {
    ID      uint      `gorm:"primaryKey" json:"id"`
    Soal    string    `json:"soal"`
    Jawaban string    `json:"jawaban"`
    Grade   int       `json:"grade"`
    Image   string    `json:"image"`
    QuizID  uint      `json:"quiz_id"`
    UserID  uint      `json:"user_id"`
    CreatedAt time.Time `json:"created_at"`
    UpdatedAt time.Time `json:"updated_at"`
}