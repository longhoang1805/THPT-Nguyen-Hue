-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2020 lúc 06:14 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(10) NOT NULL,
  `ten_dang_nhap` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_tap`
--

CREATE TABLE `bai_tap` (
  `ID_baitap` int(10) NOT NULL,
  `ID_monhoc` int(10) NOT NULL,
  `Tieu_de` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Noi_dung` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Han_cuoi` datetime NOT NULL,
  `anh` varchar(20) COLLATE utf8_bin NOT NULL,
  `File` varchar(20) COLLATE utf8_bin NOT NULL,
  `Thoi_gian_dang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `ID_diem` int(10) NOT NULL,
  `ID_hocsinh` int(10) NOT NULL,
  `ID_lop` int(10) NOT NULL,
  `Khoa` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_monhoc` int(10) NOT NULL,
  `ID_HocKy` int(10) UNSIGNED NOT NULL,
  `Diem_mieng` varchar(5) COLLATE utf8_bin NOT NULL,
  `Diem_15p1` varchar(5) COLLATE utf8_bin NOT NULL,
  `Diem15p2` varchar(5) COLLATE utf8_bin NOT NULL,
  `Diem15p3` varchar(5) COLLATE utf8_bin NOT NULL,
  `Diem_1tiet` varchar(5) COLLATE utf8_bin NOT NULL,
  `Diem_tbmon` varchar(5) COLLATE utf8_bin NOT NULL,
  `Ngay_cap_nhat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `ID_GiaoVien` int(30) NOT NULL,
  `hoten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `noisinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `quequan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bomon` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaycapnhat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanh_kiem`
--

CREATE TABLE `hanh_kiem` (
  `ID_hanhkiem` int(10) NOT NULL,
  `Khoa` datetime NOT NULL,
  `ID_hocsinh` int(10) NOT NULL,
  `ID_lop` int(10) NOT NULL,
  `ID_HocKy` int(10) UNSIGNED NOT NULL,
  `Ca_nam` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky`
--

CREATE TABLE `hocky` (
  `ID_HocKy` int(10) UNSIGNED NOT NULL,
  `NienKhoa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `TenHocKy` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_bong`
--

CREATE TABLE `hoc_bong` (
  `ID_hocbong` int(10) NOT NULL,
  `NienKhoa` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_hocsinh` int(10) NOT NULL,
  `Lop` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DIem_tbnam` varchar(5) COLLATE utf8_bin NOT NULL,
  `Ghi_chu` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten_thuong` varchar(10) COLLATE utf8_bin NOT NULL,
  `ID_HocKy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_sinh`
--

CREATE TABLE `hoc_sinh` (
  `ID_hocsinh` int(10) NOT NULL,
  `Ho_ten` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_lop` int(10) NOT NULL,
  `Khoa` int(10) NOT NULL,
  `Ngay_sinh` datetime NOT NULL,
  `Que_quan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dia_chi` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sdt` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ngay_cap_nhat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_day`
--

CREATE TABLE `lich_day` (
  `ID_lichday` int(10) NOT NULL,
  `Tuan` int(5) NOT NULL,
  `NgayBD` datetime NOT NULL,
  `NgayKT` datetime NOT NULL,
  `ID_GiaoVien` int(30) NOT NULL,
  `ID_monhoc` int(10) NOT NULL,
  `Ten_bai_day` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_lop` int(10) NOT NULL,
  `Tiet` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `ID_lop` int(10) NOT NULL,
  `lop` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ID_GiaoVien` int(30) NOT NULL,
  `idloptruong` int(10) NOT NULL,
  `idloppho` int(10) NOT NULL,
  `idbithu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `ID_monhoc` int(10) NOT NULL,
  `Ten_mon_hoc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `So_tiet_LT` varchar(5) COLLATE utf8_bin NOT NULL,
  `So_tiet_TH` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan_gv`
--

CREATE TABLE `tai_khoan_gv` (
  `ID_taikhoan_gv` int(10) NOT NULL,
  `ten_dang_nhap` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_gv` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan_hs`
--

CREATE TABLE `tai_khoan_hs` (
  `ID_taikhoan_hs` int(10) NOT NULL,
  `ten_dang_nhap` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_hs` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoi_khoa_bieu`
--

CREATE TABLE `thoi_khoa_bieu` (
  `ID_TKB` int(10) NOT NULL,
  `Tuan` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Thu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tiet` varchar(5) COLLATE utf8_bin NOT NULL,
  `ID_GiaoVien` int(30) NOT NULL,
  `ID_monhoc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_bao`
--

CREATE TABLE `thong_bao` (
  `ID_thongbao` int(10) NOT NULL,
  `Tieu_de` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` varchar(30) COLLATE utf8_bin NOT NULL,
  `file` varchar(30) COLLATE utf8_bin NOT NULL,
  `Thoi_gian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Chỉ mục cho bảng `bai_tap`
--
ALTER TABLE `bai_tap`
  ADD PRIMARY KEY (`ID_baitap`),
  ADD KEY `ID_monhoc` (`ID_monhoc`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`ID_diem`),
  ADD KEY `ID_monhoc` (`ID_monhoc`),
  ADD KEY `ID_HocKy` (`ID_HocKy`),
  ADD KEY `ID_lop` (`ID_lop`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`ID_GiaoVien`);

--
-- Chỉ mục cho bảng `hanh_kiem`
--
ALTER TABLE `hanh_kiem`
  ADD PRIMARY KEY (`ID_hanhkiem`),
  ADD KEY `ID_HocKy` (`ID_HocKy`),
  ADD KEY `ID_hocsinh` (`ID_hocsinh`,`ID_lop`),
  ADD KEY `ID_lop` (`ID_lop`);

--
-- Chỉ mục cho bảng `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`ID_HocKy`);

--
-- Chỉ mục cho bảng `hoc_bong`
--
ALTER TABLE `hoc_bong`
  ADD PRIMARY KEY (`ID_hocbong`),
  ADD KEY `ID_HocKy` (`ID_HocKy`),
  ADD KEY `ID_hocsinh` (`ID_hocsinh`);

--
-- Chỉ mục cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  ADD PRIMARY KEY (`ID_hocsinh`),
  ADD KEY `ID_lop` (`ID_lop`);

--
-- Chỉ mục cho bảng `lich_day`
--
ALTER TABLE `lich_day`
  ADD PRIMARY KEY (`ID_lichday`),
  ADD KEY `ID_GiaoVien` (`ID_GiaoVien`),
  ADD KEY `ID_monhoc` (`ID_monhoc`),
  ADD KEY `ID_lop` (`ID_lop`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`ID_lop`),
  ADD KEY `idgiaovien` (`ID_GiaoVien`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`ID_monhoc`);

--
-- Chỉ mục cho bảng `tai_khoan_gv`
--
ALTER TABLE `tai_khoan_gv`
  ADD PRIMARY KEY (`ID_taikhoan_gv`);

--
-- Chỉ mục cho bảng `tai_khoan_hs`
--
ALTER TABLE `tai_khoan_hs`
  ADD PRIMARY KEY (`ID_taikhoan_hs`);

--
-- Chỉ mục cho bảng `thoi_khoa_bieu`
--
ALTER TABLE `thoi_khoa_bieu`
  ADD PRIMARY KEY (`ID_TKB`),
  ADD KEY `ID_GiaoVien` (`ID_GiaoVien`,`ID_monhoc`),
  ADD KEY `ID_monhoc` (`ID_monhoc`);

--
-- Chỉ mục cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`ID_thongbao`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_admin` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bai_tap`
--
ALTER TABLE `bai_tap`
  MODIFY `ID_baitap` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `ID_diem` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `ID_GiaoVien` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hanh_kiem`
--
ALTER TABLE `hanh_kiem`
  MODIFY `ID_hanhkiem` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hocky`
--
ALTER TABLE `hocky`
  MODIFY `ID_HocKy` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoc_bong`
--
ALTER TABLE `hoc_bong`
  MODIFY `ID_hocbong` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  MODIFY `ID_hocsinh` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lich_day`
--
ALTER TABLE `lich_day`
  MODIFY `ID_lichday` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `ID_monhoc` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tai_khoan_gv`
--
ALTER TABLE `tai_khoan_gv`
  MODIFY `ID_taikhoan_gv` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tai_khoan_hs`
--
ALTER TABLE `tai_khoan_hs`
  MODIFY `ID_taikhoan_hs` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thoi_khoa_bieu`
--
ALTER TABLE `thoi_khoa_bieu`
  MODIFY `ID_TKB` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  MODIFY `ID_thongbao` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bai_tap`
--
ALTER TABLE `bai_tap`
  ADD CONSTRAINT `bai_tap_ibfk_1` FOREIGN KEY (`ID_monhoc`) REFERENCES `mon_hoc` (`ID_monhoc`);

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`ID_HocKy`) REFERENCES `hocky` (`ID_HocKy`),
  ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`ID_lop`) REFERENCES `lop` (`ID_lop`),
  ADD CONSTRAINT `diem_ibfk_3` FOREIGN KEY (`ID_monhoc`) REFERENCES `mon_hoc` (`ID_monhoc`);

--
-- Các ràng buộc cho bảng `hanh_kiem`
--
ALTER TABLE `hanh_kiem`
  ADD CONSTRAINT `hanh_kiem_ibfk_1` FOREIGN KEY (`ID_HocKy`) REFERENCES `hocky` (`ID_HocKy`),
  ADD CONSTRAINT `hanh_kiem_ibfk_2` FOREIGN KEY (`ID_hocsinh`) REFERENCES `hoc_sinh` (`ID_hocsinh`);

--
-- Các ràng buộc cho bảng `hoc_bong`
--
ALTER TABLE `hoc_bong`
  ADD CONSTRAINT `hoc_bong_ibfk_1` FOREIGN KEY (`ID_HocKy`) REFERENCES `hocky` (`ID_HocKy`),
  ADD CONSTRAINT `hoc_bong_ibfk_2` FOREIGN KEY (`ID_hocsinh`) REFERENCES `hoc_sinh` (`ID_hocsinh`);

--
-- Các ràng buộc cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  ADD CONSTRAINT `hoc_sinh_ibfk_1` FOREIGN KEY (`ID_lop`) REFERENCES `lop` (`ID_lop`);

--
-- Các ràng buộc cho bảng `lich_day`
--
ALTER TABLE `lich_day`
  ADD CONSTRAINT `lich_day_ibfk_1` FOREIGN KEY (`ID_GiaoVien`) REFERENCES `giaovien` (`ID_GiaoVien`),
  ADD CONSTRAINT `lich_day_ibfk_2` FOREIGN KEY (`ID_lop`) REFERENCES `lop` (`ID_lop`),
  ADD CONSTRAINT `lich_day_ibfk_3` FOREIGN KEY (`ID_monhoc`) REFERENCES `mon_hoc` (`ID_monhoc`);

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`ID_lop`) REFERENCES `giaovien` (`ID_GiaoVien`);

--
-- Các ràng buộc cho bảng `thoi_khoa_bieu`
--
ALTER TABLE `thoi_khoa_bieu`
  ADD CONSTRAINT `thoi_khoa_bieu_ibfk_1` FOREIGN KEY (`ID_monhoc`) REFERENCES `mon_hoc` (`ID_monhoc`),
  ADD CONSTRAINT `thoi_khoa_bieu_ibfk_2` FOREIGN KEY (`ID_GiaoVien`) REFERENCES `giaovien` (`ID_GiaoVien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
