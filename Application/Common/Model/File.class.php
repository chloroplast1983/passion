<?php
namespace Common\Model;

use Marmot\Core;
use Intervention\Image\ImageManagerStatic as ImageThumb;

/**
 * 旧类需要重构
 * 20150502 简单重构
 * @todo 需要添加重构上传文件用户
 */
class File
{
    
    /**
     * @var int $id 文件id
     */
    private $id;
    /**
     * @var string $fileHash 文件hash验证码
     */
    private $fileHash;
    /**
     * @var string $fileErr 文件错误代码
     */
    private $fileErr;
    /**
     * @var string $fileName 文件名称
     */
    private $fileName;
    /**
     * @var string $fileExt 文件后缀
     */
    private $fileExt;
    /**
     * @var string $filePath 文件路径
     */
    private $filePath;
    /**
     * @var string $fileSize 文件大小
     */
    private $fileSize;
    /**
     * @var int $fileTime 文件上传时间
     */
    private $fileTime;
    /**
     * @var int $fileUid 文件上传用户id
     */
    private $fileUid;

    /**
     * @var string $fileTemp 临时文件地址
     */
    private $fileTemp;

    /**
     * @Inject("file.uploadDirType")
     */
    private $uploadDirType;

    /**
     * @Inject("file.attachDir")
     */
    private $attachDir;

    /**
     * @Inject("file.siteUrl")
     */
    private $siteUrl;

    private $fileTypeData   = array(    //所有支持的文档
            'av' => array('av', 'avi', 'wmv', 'wav'),
            'real' => array('rm', 'rmvb'),
            'binary' => array('dat'),
            'flash' => array('swf'),
            'html' => array('html', 'htm'),
            'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
            'office' => array('doc', 'xls', 'ppt'),
            'pdf' => array('pdf'),
            'rar' => array('rar', 'zip'),
            'text' => array('txt'),
            'bt' => array('bt'),
            'zip' => array('tar', 'rar', 'zip', 'gz'),
        );
    //允许上传的类型组key（无需转义后缀）
    private $fileTypeAllow  =['image'];

    /**
     * File 文件领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->fileHash = '';
        $this->fileErr = '';
        $this->fileName = '';
        $this->fileExt = '';
        $this->filePath = '';
        $this->fileSize = '';
        $this->fileTime = $_FWGLOBAL['timestamp'];
        $this->fileUid = 0;
        $this->fileTemp = '';
    }

    /**
     * File 文件领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->fileHash);
        unset($this->fileErr);
        unset($this->fileName);
        unset($this->fileExt);
        unset($this->filePath);
        unset($this->fileSize);
        unset($this->fileTime);
        unset($this->fileUid);
        unset($this->fileTemp);
    }

    /**
     * 设置文件id
     * @param int $id 文件id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取文件id
     * @return int $id 文件id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置文件hash验证码
     * @param string $fileHash 文件hash验证码
     */
    public function setFileHash(string $fileHash)
    {
        $this->fileHash = $fileHash;
    }

    /**
     * 获取文件hash验证码
     * @return string $fileHash 文件hash验证码
     */
    public function getFileHash()
    {
        return $this->fileHash;
    }

    /**
     * 设置文件错误代码
     * @param string $fileErr 文件错误代码
     */
    public function setFileErr(string $fileErr)
    {
        $this->fileErr = $fileErr;
    }

    /**
     * 获取文件错误代码
     * @return string $fileErr 文件错误代码
     */
    public function getFileErr()
    {
        return $this->fileErr;
    }

    /**
     * 设置文件名称
     * @param string $fileName 文件名称
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * 获取文件名称
     * @return string $fileName 文件名称
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * 设置文件后缀
     * @param string $fileExt 文件后缀
     */
    public function setFileExt(string $fileExt)
    {
        $this->fileExt = $fileExt;
    }

    /**
     * 获取文件后缀
     * @return string $fileExt 文件后缀
     */
    public function getFileExt()
    {
        return $this->fileExt;
    }

    /**
     * 设置文件路径
     * @param string $filePath 文件路径
     */
    public function setFilePath(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * 获取文件路径
     * @return string $filePath 文件路径
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * 设置文件大小
     * @param string $fileSize 文件大小
     */
    public function setFileSize(string $fileSize)
    {
        $this->fileSize = $fileSize;
    }

    /**
     * 获取文件大小
     * @return string $fileSize 文件大小
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * 设置文件上传时间
     * @param int $fileTime 文件上传时间
     */
    public function setFileTime(int $fileTime)
    {
        $this->fileTime = $fileTime;
    }

    /**
     * 获取文件上传时间
     * @return int $fileTime 文件上传时间
     */
    public function getFileTime()
    {
        return $this->fileTime;
    }

    /**
     * 设置文件上传用户id
     * @param int $fileUid 文件上传用户id
     */
    public function setFileUid(int $fileUid)
    {
        $this->fileUid = $fileUid;
    }

    /**
     * 获取文件上传用户id
     * @return int $fileUid 文件上传用户id
     */
    public function getFileUid()
    {
        return $this->fileUid;
    }

    /**
     * 获取文件上传目录
     * @return string $attachDir 文件目录
     */
    public function getAttachDir()
    {
        return $this->attachDir;
    }


    //一般上传
    public function upload(string $fileName)
    {
        //获取基础信息（大小、临时地址、名字、错误编号）
        $this->calculateFileSize($_FILES[$fileName]['size']);
        $this->fileTemp     = $_FILES[$fileName]['tmp_name'];
        $this->fileName     = $_FILES[$fileName]['name'];
        $this->fileErr  = $_FILES['error'];
        
        //基础错误判断
        if (!$this->checkFileTemp()) {
            return false;
        }
        //获取文件Hash
        $this->fileHash = md5(md5_file($this->fileTemp).$_FILES[$fileName]['size']);
        //获取文件后缀
        $this->fileExt = $this->getFileExtFromFileName();
        //判断后缀是否允许
        $this->checkFileExt();

        //上传、移动临时文件部分
        $this->fileMove($this->fileTemp, $this->getPath(), true);

        $repository = Core::$container->get('Common\Repository\File\FileRepository');

        return $repository->add($this);
    }

    public function getFileURL(int $width = 0, int $height = 0, int $waterMark = 0)
    {
        if ($width == 0 && $height == 0 && !$waterMark) {
            return $this->siteUrl.$this->getAttachDir().$this->getFilePath();
        }
        
        if ($width > 0 && $height > 0) {
            $filePath = $this->getAttachDir().$this->getFilePath();
            
            $thumbImg = ImageThumb::make($filePath);
            $thumbImg->resize($width, $height);
            
            $filePathWithiutExt = explode('.', $filePath);
            $filePathWithiutExt = $filePathWithiutExt[0];

            $thumFilePath = $filePathWithiutExt.'.'.$width.'_'.$height.'_'.$waterMark.'.'.$this->getFileExt();

            if (file_exists($thumFilePath)) {
                return $this->siteUrl.$thumFilePath;
            }
            if ($waterMark) {
                $thumbImg->insert('Global/Style/Home/images/watermark.png');
            }

            $thumbImg->save($thumFilePath);

            return $this->siteUrl.$thumFilePath;
        }
    }

    //基础错误判断
    private function checkFileTemp()
    {
        if (empty($this->fileSize)||empty($this->fileTemp)||!empty($this->fileErr)) {
            return false;
        }
        return true;
    }
    
    //获取路径
    private function getPath($fileName = '')
    {

        if ($this->uploadDirType == 'date') {
            $name1 = gmdate('Ym');
            $name2 = gmdate('j');
        } elseif ($this->uploadDirType == 'ext') {
            $name1 = $fileExt = isset($fileName)?$this->getFileExt($fileName):$this->fileExt;
            $name2 = gmdate('Ymj');
        } else {
            //默认时间
            $name1 = gmdate('Ym');
            $name2 = gmdate('j');
        }
        //判断第一层文件夹
        $newfilename = $this->attachDir.$name1.DIRECTORY_SEPARATOR;

        if (!is_dir($newfilename)) {
            if (!@mkdir($newfilename, 0777)) {
                return false;
            }
        }
        //判断第二层文件夹
        $newfilename .= $name2.DIRECTORY_SEPARATOR;
        if (!is_dir($newfilename)) {
            if (!mkdir($newfilename, 0777)) {
                return false;
            }
        }
        //路径赋值
        $this->filePath = $name1.'/'.$name2.'/'.$this->fileHash.'.'.$this->fileExt;
        //返回服务器路径
        return $newfilename.$this->fileHash.'.'.$this->fileExt;
    }
    
    //获取后缀
    private function getFileExtFromFileName($fileName = '')
    {
        $fileName = empty($fileName)?$this->fileName:$fileName;
        return strtolower(substr(strrchr($fileName, '.'), 1, 10));
    }
    //判断后缀是否需要更改
    private function checkFileExt($fileExt = '')
    {
        
        $fileExt = empty($fileExt)?$this->fileExt:$fileExt;
        foreach ($this->fileTypeData as $key => $value) {
            if (in_array($fileExt, $value)) {
                $return = $key;
                break;
            }
        }
        if (!$return || !in_array($return, $this->fileTypeAllow)) {
            $this->fileExt = '_'.$this->fileExt;
        }
        return true;
    }
    
    //获取文件大小
    private function calculateFileSize(int $fileSize)
    {
        $this->fileSize = $this->formatsize($fileSize);
    }
    
    //格式化文件大小
    public function formatsize($size)
    {
        $prec=3;
        $size = round(abs($size));
        $units = array(0=>" B ", 1=>" KB", 2=>" MB", 3=>" GB", 4=>" TB");
        if ($size==0) {
            return str_repeat(" ", $prec)."0$units[0]";
        }
        $unit = min(4, floor(log($size)/log(2)/10));
        $size = $size * pow(2, -10*$unit);
        $digi = $prec - 1 - floor(log($size)/log(10));
        $size = round($size * pow(10, $digi)) * pow(10, -$digi);
        return $size.$units[$unit];
    }
    //移动文件
    public static function fileMove($formFilePath, $toFilePath, $deleteFile = false)
    {
        if (@copy($formFilePath, $toFilePath)) {
            if ($deleteFile) {
                @unlink($formFilePath);
            }
        } elseif ((function_exists('move_uploaded_file') && @move_uploaded_file($formFilePath, $toFilePath))) {
            return false;//调试用
        } elseif (@rename($formFilePath, $toFilePath)) {
            return false;//调试用
        } else {
            return false;
        }
    }
}
