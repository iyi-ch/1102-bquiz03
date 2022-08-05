<div style="height:300px;">
<div class="ct">預告片清單</div>

<div style="width:100%;display:fiex;justify-content:space-between"></div>
<div style="width:25%;text-align:center;background:#eee">預告片海報</div>
<div style="width:25%;text-align:center;background:#eee">預告片片名</div>
<div style="width:25%;text-align:center;background:#eee">預告片排序</div>
<div style="width:25%;text-align:center;background:#eee">操作</div>

<form action="./api/edit_poster.php" method="post"></form>

<div style="width:100%;height:210px;overflow:auto">
<?php
$rows=$Poster->all(" order by rank");
foreach($rows as $row){
    ?>
    <div style="width:100%;display:flex;justify-content:space-between;margin:2px 0"></div>
    <div style="width:24.6%;" class="ct">
        <img src="./upload/<?$row['img'];?>" style="height:70%;">
    </div>
    <div>
        <input type="text" name="mane[]" value="<?=$row['name'];?>">
    </div>
    <div>
    <button type="button">往上</button>
    <button type="button">往下</button>
    </div>

    <?php
}

</div>
<div style="width:95%;" class="ct"></div>
<input type="submit" value="編輯確定"><input type="reset" value="重置">


</div>
<hr>
<div style="height:180px;">
<div class="ct">新增預告片海報</div>
<form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
<table style="width:80%;margin:auto;">
    <tr>
        <td>預告片海報</td>
        <td><input type="file" name="img" id=""></td>
        <td>預告片片名</td>
        <td><input type="text" name="img" id=""></td>
    </tr>
</table>
<div class="ct">
<input type="submit" value="新增">
<input type="reset" value="重置">
</div>

</form>
</div>