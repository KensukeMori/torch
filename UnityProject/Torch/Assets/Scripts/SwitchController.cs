using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SwitchController : MonoBehaviour {

    public List<ItemData> m_itemList;
    public GameObject m_TorchPrefab;
    public ExitManager m_ExitManager;

    private float m_TimeOnPlayGhost;
    private bool m_PlayingGhost;
    
    //ゴーストの再生を行う関数
    public IEnumerator PlayGhost()
    {
        float sPassedTime = 0f; //item.timeがスタート時からの時間経過のため、差分をとるための変数

        foreach (ItemData item in m_itemList)
        {
            yield return new WaitForSeconds(item.time - sPassedTime);

            if(item.itemType == 1)
            {
                //torchをインスタンス化
                Vector3 sCoordinate = new Vector3(item.itemXCoordinate, item.itemYCoordinate, item.itemZCoordinate);
                Instantiate(m_TorchPrefab, sCoordinate, Quaternion.identity);
            }
            else if(item.itemType == 2)
            {
                //デッドポイント表示
                Debug.Log("deadpoint設置します。");
            }
            else if(item.itemType == 3)
            {
                //Exit封鎖
                Debug.Log("exit1封鎖します。");
                m_ExitManager.CloseExit(0);
            }
            else if (item.itemType == 4)
            {
                //Exit封鎖
                Debug.Log("exit2封鎖します。");
                m_ExitManager.CloseExit(1);
            }

            sPassedTime = item.time;

        }
    }
}
