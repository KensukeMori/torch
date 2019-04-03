using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using MiniJSON;

public class ItemDataModel{

    //Jsonファイルをデシリアライズし、データクラスに合わせて整形する
	static public List<SequenceData> DeserializeFromJson(string sStrJson)
    {
        //
        List<SequenceData> retSeq = new List<SequenceData>();
        SequenceData tmpSeq = null;

        List<ItemData> ret = new List<ItemData>();
        ItemData tmp = null;

        int switchCount = 1;


        IList jsonSeqList = (IList)Json.Deserialize(sStrJson);

        foreach (IList jsonList in jsonSeqList)
        {
            tmpSeq = new SequenceData();
            ret = new List<ItemData>();
            foreach (IDictionary jsonOne in jsonList)
            {

                tmp = new ItemData();

                if (jsonOne.Contains("ItemId"))
                {
                    tmp.itemId = (int)(long)jsonOne["ItemId"];
                }
                if (jsonOne.Contains("ItemType"))
                {
                    tmp.itemType = (int)(long)jsonOne["ItemType"];
                }
                if (jsonOne.Contains("UserId"))
                {
                    tmp.userId = (int)(long)jsonOne["UserId"];
                }
                if (jsonOne.Contains("SequenceId"))
                {
                    tmp.sequenceId = (int)(long)jsonOne["SequenceId"];
                }
                if (jsonOne.Contains("stageId"))
                {
                    tmp.stageId = (int)(long)jsonOne["stageId"];
                }
                if (jsonOne.Contains("Time"))
                {
                    tmp.time = System.Convert.ToSingle(jsonOne["Time"]);
                }
                if (jsonOne.Contains("XCoordinate"))
                {
                    tmp.itemXCoordinate = System.Convert.ToSingle(jsonOne["XCoordinate"]);
                }
                if (jsonOne.Contains("YCoordinate"))
                {
                    tmp.itemYCoordinate = System.Convert.ToSingle(jsonOne["YCoordinate"]);
                }
                if (jsonOne.Contains("ZCoordinate"))
                {
                    tmp.itemZCoordinate = System.Convert.ToSingle(jsonOne["ZCoordinate"]);
                }

                ret.Add(tmp);
                tmp = null;

            }
            tmpSeq.itemList = ret;
            tmpSeq.switchId = switchCount;
            switchCount++;

            retSeq.Add(tmpSeq);
            tmpSeq = null;
        }

        return retSeq;

    }

     public string SerializeToJson(IList<ItemData> itemDataList)
    {
        Dictionary<string, object> itemDic = new Dictionary<string, object>();
        IList<Dictionary<string, object>> itemList = new List<Dictionary<string, object>>(); 

        foreach (ItemData itemData in itemDataList)
        {
            itemDic = new Dictionary<string, object>();
            itemDic.Add("itemType", itemData.itemType);
            itemDic.Add("sequenceId", itemData.sequenceId);
            itemDic.Add("stageId", itemData.stageId);
            itemDic.Add("time", itemData.time);
            itemDic.Add("xCoordinate", itemData.itemXCoordinate);
            itemDic.Add("yCoordinate", itemData.itemYCoordinate);
            itemDic.Add("zCoordinate", itemData.itemZCoordinate);
            itemList.Add(itemDic);
        }
        var itemJson = Json.Serialize(itemList);
        Debug.Log(itemJson);
        return itemJson;
    }
}
