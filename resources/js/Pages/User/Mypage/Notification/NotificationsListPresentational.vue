<template>
    <div class="notifications-section">
        <h2 class="notifications-title">運営からのお知らせ</h2>
        <div class="notification-item">
            <div class="notification-text">
            <p class="notification-heading">ポイントの有効期限が迫っています</p>
            <p class="notification-date">2023-09-27</p>
            </div>
            <div class="notification-arrow">&gt;</div>
        </div>
        <div class="notification-item notification-important">
            <div class="notification-indicator"></div>
            <div class="notification-text">
            <p class="notification-heading">ネットワーク不具合のお知らせ</p>
            <p class="notification-date">2023-09-27</p>
            </div>
            <div class="notification-arrow">&gt;</div>
        </div>
    </div>
</template>

<style scoped>
/* 重要なお知らせ */
.notifications-section {
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin: 20px;
  padding: 10px;
}

.notifications-title {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin: 0 0 10px 0;
  padding: 0;
}

.notification-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-top: 1px solid #ddd;
  padding: 10px 0;
}

.notification-item:first-child {
  border-top: none;
}

.notification-text {
  flex-grow: 1;
}

.notification-heading {
  font-size: 14px;
  margin: 0 0 5px 0;
  color: #333;
}

.notification-date {
  font-size: 12px;
  color: #666;
}

.notification-arrow {
  color: #ccc;
  font-size: 16px;
}

.notification-important .notification-heading {
  color: #d00; /* または、重要なお知らせに適した色に変更 */
}

.notification-indicator {
  flex-shrink: 0;
  height: 10px;
  width: 10px;
  background-color: red;
  border-radius: 50%;
  margin-right: 10px;
}
</style>