
//松明、デッドポイント、使用した出口の情報を保存するデータクラス
public class ItemData {

    public int itemId;
    public int itemType;    //松明、デッドポイント、出口の種別
    public int userId;
    public int sequenceId;
    public int stageId;
    public float time;
    public float itemXCoordinate;
    public float itemYCoordinate;
    public float itemZCoordinate;

    public ItemData()
    {
        itemId      = 0;
        itemType    = 0;
        userId      = 0;
        sequenceId  = 0;
        stageId     = 0;
        time        = 0f;

        itemXCoordinate = 0f;
        itemYCoordinate = 0f;
        itemZCoordinate = 0f;

    }

}
